<?php

  class Contacts extends Model {

    public $id;
    public $user_id;
    public $fname;
    public $lname;
    public $email;
    public $address;
    public $address2;
    public $city;
    public $state;
    public $zip;
    public $home_phone;
    public $cell_phone;
    public $work_phone;
    public $deleted = 0;

    public function __construct() {
      $table = 'contacts';
      parent::__construct($table);
      $this->_softDelete = true;
    }

    public static $addValidation = [
      'fname' => [
        'display' => 'First Name',
        'required' => true,
        'max' => 155
      ],
      'lname' => [
        'display' => 'First Name',
        'required' => true,
        'max' => 155
      ]
    ];

    public function findAllByUserId($user_id, $params = []) {
      $conditions = [
        'conditions' => 'user_id = ?',
        'bind' => [$user_id]
      ];
      $conditions = array_merge($conditions, $params);
      return $this->find($conditions);
    }

    public function displayName() {
      return $this->fname . ' ' . $this->lname;
    }

    public function findByIdAndUserId($contact_id, $user_id, $params = []) {
      $conditions = [
        'conditions' => 'id = ? AND user_id = ?',
        'bind' => [$contact_id, $user_id]
      ];
      $conditions = array_merge($conditions, $params);
      return $this->findFirst($conditions);
    }

    public function displayAddress() {
      $address = '';
      if(!empty($this->address)) {
        $address .= $this->address . '<br>';
      }
      if(!empty($this->address2)) {
        $address .= $this->address2 . '<br>';
      }
      if(!empty($this->city)) {
        $address .= $this->city . ', ';
      }
      $address .= $this->state . ' ' . $this->zip . '<br>';
      return $address;
    }

    public function displayAddessLabel() {
      $html = $this->displayName() . '<br>';
      $html .= $this->displayAddress();
      return $html;
    }
  }
