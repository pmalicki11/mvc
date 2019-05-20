<?php

  class Register extends Controller {

    public function __construct($controller, $action) {
      parent::__construct($controller, $action);
      $this->load_model('Users');
      $this->view->setLayout('default');
    }

    public function loginAction() {
      $validation = new Validate();
      if($_POST) {
        //validation
        $validation->check($_POST, [
          'username' => [
            'display' => 'Username',
            'required' => true
          ],
          'password' => [
            'display' => 'Password',
            'required' => true,
          ]
        ]);
        if($validation->passed()) {
          $user = $this->UsersModel->findByUsername($_POST['username']);
          if($user && password_verify(Input::get('password'), $user->password)) {
            $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');
          } else {
            $validation->addError("There is an error with your username or password.");
          }
        }
      }
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('register/login');
    }

    public function logoutAction() {
      if(currentUser()) {
        currentUser()->logout();
      }
      Router::redirect('register/login');
    }

    public function registerAction() {
      $validation = new Validate();
      $posted_values = ['fname' => '',
        'lname' => '',
        'email' => '',
        'username' => '',
        'password' => '',
        'confirm' => ''
      ];
      if($_POST) {
        $posted_values = posted_values($_POST);
      }
      $this->view->post = $posted_values;
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('register/register');
    }
  }
