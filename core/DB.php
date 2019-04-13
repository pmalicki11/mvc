<?php

  class DB {
    private static $_instance = null;
    private $_pdo;
    private $_query;
    private $_result;
    private $_count = 0;
    private $_error = false;
    private $_lastInsertID = null;

    private function __construct(){
      try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $this->_pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
      } catch (PDOException $e) {
        die($e->getMessage());
      }
    }

    public static function getInstance() {
      if(!isset(self::$_instance)) {
        self::$_instance = new DB();
      }
      return self::$_instance;
    }
  }
