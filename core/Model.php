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
  }
