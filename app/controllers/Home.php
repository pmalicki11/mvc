<?php

  class Home extends Controller {

    public function __construct($controller, $action) {
      parent::__construct($controller, $action);
    }

    public function indexAction() {
      $db = DB::getInstance();
      $fields = [
        'fname' => 'Mariia',
        'lname' => 'Tarasenko',
        'email' => 'manyat5pol@gmail.com'
      ];
      $contacts = $db->insert('contacts', $fields);
      $this->view->render('home/index');
    }
  }
