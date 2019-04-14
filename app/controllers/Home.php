<?php

  class Home extends Controller {

    public function __construct($controller, $action) {
      parent::__construct($controller, $action);
    }

    public function indexAction() {
      $db = DB::getInstance();
      dnd($db->getColumns('contacts'));
      $this->view->render('home/index');
    }
  }
