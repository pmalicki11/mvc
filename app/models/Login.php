<?php

  class Login extends Model {

    public $username;
    public $password;
    public $remember_me;

    public function __construct() {
      parent::__construct('mp_fake');
    }

    public function validator() {
      $this->runValidation(new RequiredValidator($this, ['field' => 'username', 'msg' => 'Username is required.']));
      $this->runValidation(new RequiredValidator($this, ['field' => 'password', 'msg' => 'Password is required.']));
    }

    public function getRememberMeChecked() {
      return $this->remember_me == 'on';
    }
  }
