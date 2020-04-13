<?php

class Database {
  private $_conn = null;
  public function getConnection() {
    if(!is_null($this->_conn)){
      return $this->_conn;
    }

    $this->_conn = false;

    try{
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ];

      $this->_conn = new PDO('sqlite:../database/company.db', null, null, $options);
    }

    catch (PDOException $e) {
      echo 'Connection Error: '.$e->getMessage();
    }

    return $this->_conn;
  }
}