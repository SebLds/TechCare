<?php

namespace App\Model;
use DateInterval;
use DateTime;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Module extends Model {

  public function getModule() {
    $sqlStatement = 'SELECT * FROM module';
    try {
      return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
    } catch (ConfigException $e) {
    }
  }

  public function addModule($name, $typetest=null, $sportsman, $sedentary, $actif) {
      $sqlStatement = 'INSERT INTO module (name, typetest, sportsman, sedentary, actif) VALUES (:name, :typetest, :sportsman, :sedentary, :actif)';
      return $this->executeRequest($sqlStatement, array('name' => $name, 'typetest' => $typetest, 'sportsman' => $sportsman, 'sedentary' => $sedentary, 'actif' => $actif));
  }

  public function deleteModule($name) {
    $sqlStatement = 'DELETE FROM module WHERE name = :name';
    try {
      return $this->executeRequest($sqlStatement, array('name' => $name));
    } catch (ConfigException $e) {
    }
  }

  public function associate($name, $typetest) {
    $sqlStatement = 'UPDATE module SET typetest = :typetest  WHERE name = :name';
    try {
      return $this->executeRequest($sqlStatement, array('typetest' => $typetest, 'name' => $name));
    } catch (ConfigException $e) {
    }
  }

  public function getModuleForTest($typetest) {
    $sqlStatement = 'SELECT name, sportsman, sedentary FROM module WHERE typetest = :typetest';
    return $this->executeRequest($sqlStatement, array('typetest' => $typetest))->fetchAll(PDO::FETCH_OBJ);
  }

}
