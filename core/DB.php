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

    public function query($sql, $params = []) {
      $this->_error = false;
      if($this->_query = $this->_pdo->prepare($sql)) {
        $x = 1;
        if(count($params)) {
          foreach ($params as $param) {
            $this->_query->bindValue($x, $param);
            $x++;
          }
        }

        if ($this->_query->execute()) {
          $this->_result = $this->_query->fetchALL(PDO::FETCH_OBJ);
          $this->_count = $this->_query->rowCount();
          $this->_lastInsertID = $this->_pdo->lastInsertId();
        } else {
          $this->_error = true;
        }
      }
      return $this;
    }

    public function insert($table, $fields = []) {
      $fieldString = '';
      $valueString = '';
      $values = [];

      foreach($fields as $field => $value) {
        $fieldString .= '`' . $field . '`,';
        $valueString .= '?,';
        $values[] = $value;
      }
      $fieldString = rtrim($fieldString, ',');
      $valueString = rtrim($valueString, ',');

      $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
      if(!$this->query($sql, $fields)->error()) {
        return true;
      }
      return false;
    }

    public function error() {
      return $this->_error;
    }
  }
