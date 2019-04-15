<?php

  class Model {

    protected $_db;
    protected $_table;
    protected $_modelName;
    protected $_softDelete = false;
    protected $_columnNames = [];

    public function __construct($table) {
      $this->_db = DB::getinstance();
      $this->_table = $table;
      $this->setTableColumns();
      $this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
    }

    protected function _setTableColumns() {
      $columns = $this->getColumns();
      foreach($columns as $column) {
        $this->_columnNames[] = $colunm->Field;
        $this->{$colunmName} = null;
      }
    }

    public function getColumns() {
      return $this->_db->getColumns($this->_table);
    }

    public function find($params = []) {
      $results = [];
      $resultsQuery = $this->_db->find($this->_table, $params);
      foreach($resultsQuery as $result) {
        $obj = new $this->_modelName($this->_table);
        $obj->populateObjData($result);
        $results[] = $obj;
      }
      return $results;
    }

    public function findFirst($params = []) {
      $resultQuery = $this->_db->findFirst($this->_table, $params);
      $result = new $this->_modelName($this->_table);
      $result->populateObjData($resultQuery);
      return $result;
    }

    public function findById($id) {
      return $this->findFirst(['conditions' => 'id = ?', 'bind' => [$id]]);
    }

    protected function populateObjData($result) {
      foreach($result as $key => $val) {
        $this->$key = $val;
      }
    }
  }
