<?php

  class Users extends Model {

    private $_isLoggedIn;
    private $_sessionName;
    private $_cookieName;
    private $_confirm;
    public static $currentLoggedInUser = null;
    public $username;
    public $email;
    public $password;
    public $fname;
    public $lname;
    public $acl;
    public $deleted = 0;

    public function __construct($user = '') {
      $table = 'users';
      parent::__construct($table);
      $this->_sessionName = CURRENT_USER_SESSION_NAME;
      $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
      $this->_softDelete = true;
      if($user != '') {
        if(is_int($user)) {
          $u = $this->_db->findFirst('users', ['conditions' => 'id = ?', 'bind' => [$user]], 'Users');
        } else {
          $u = $this->_db->findFirst('users', ['conditions' => 'username = ?', 'bind' => [$user]], 'Users');
        }
        if($u) {
          foreach($u as $key =>$val) {
            $this->$key = $val;
          }
        }
      }
    }

    public function validator() {
      $this->runValidation(new RequiredValidator($this, ['field' => 'fname', 'msg' => 'First name is required.']));
      $this->runValidation(new RequiredValidator($this, ['field' => 'lname', 'msg' => 'Last name is required.']));
      $this->runValidation(new RequiredValidator($this, ['field' => 'email', 'msg' => 'Email is required.']));
      $this->runValidation(new MaxValidator($this, ['field' => 'email', 'rule' => 150, 'msg' => 'Email must be less than 150 characters.']));
      $this->runValidation(new EmailValidator($this, ['field' => 'email', 'msg' => 'You must provide valid email address.']));
      $this->runValidation(new MinValidator($this, ['field' => 'username', 'rule' => 6, 'msg' => 'Username must be at least 6 characters.']));
      $this->runValidation(new MaxValidator($this, ['field' => 'username', 'rule' => 150, 'msg' => 'Username must be less than 150 characters.']));
      $this->runValidation(new UniqueValidator($this, ['field' => 'username', 'msg' => 'That username already exists. Please choose a new one.']));
      $this->runValidation(new RequiredValidator($this, ['field' => 'password', 'msg' => 'Password is required.']));
      $this->runValidation(new MinValidator($this, ['field' => 'password', 'rule' => 6, 'msg' => 'Password must be at least 6 characters.']));
      $this->runValidation(new MatchesValidator($this, ['field' => 'password', 'rule' => $this->_confirm, 'msg' => 'Your passwords do not match.']));
    }

    public function beforeSave() {
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function findByUsername($username) {
      return $this->findFirst(['conditions' => 'username = ?', 'bind' => [$username]]);
    }

    public static function currentUser() {
      if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
        self::$currentLoggedInUser = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
      }
      return self::$currentLoggedInUser;
    }

    public function login($rememberMe = false) {
      Session::set($this->_sessionName, $this->id);
      if($rememberMe) {
        $hash = md5(uniqid() + rand(0, 100));
        $user_agent = Session::uagent_no_version();
        Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
        $fields = ['session' => $hash, 'user_agent' => $user_agent, 'user_id' => $this->id];
        $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
        $this->_db->insert('user_sessions', $fields);
      }
    }

    public static function loginUserFromCookie() {
      $userSession = UserSessions::getFromCookie();
      if($userSession && $userSession->user_id != '') {
        $user = new self((int)$userSession->user_id);
        if($user) {
          $user->login();
        }
        return $user;
      }
      return;
    }

    public function logout() {
      $userSession = UserSessions::getFromCookie();
      if($userSession) {
        $userSession->delete($userSession->id);
      }
      Session::delete(CURRENT_USER_SESSION_NAME);
      if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
        Cookie::delete(REMEMBER_ME_COOKIE_NAME);
      }
      self::$currentLoggedInUser = null;
      return true;
    }

    public function acls() {
      if(empty($this->acl)) return [];
      return json_decode($this->acl, true);
    }

    public function setConfirm($value) {
      $this->_confirm = $value;
    }

    public function getConfirm() {
      return $this->_confirm;
    }
  }
