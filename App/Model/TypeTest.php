<?php

namespace App\Model;
use DateInterval;
use DateTime;
use PDO;
use src\Config\ConfigException;
use src\Model;

class TypeTest extends Model {

  public function getTypeTest() {
    $sqlStatement = 'SELECT * FROM typetest';
    try {
      return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
    } catch (ConfigException $e) {
    }
  }

  public function addTypeTest($name) {
    $sqlStatement = 'INSERT INTO typetest (name) VALUES (:name)';
    try {
      return $this->executeRequest($sqlStatement, array('name' => $name));
    } catch (ConfigException $e) {
    }
  }

  public function deleteTypeTest($name) {
    $sqlStatement = 'DELETE FROM typetest WHERE name = :name';
    $sql = 'UPDATE module SET typetest = :typetest WHERE typetest=:name';
    try {
      $this->executeRequest($sqlStatement, array('name' => $name));
      $this->executeRequest($sql, array('name' => $name,'typetest' => null));
    } catch (ConfigException $e) {
    }
  }

}
