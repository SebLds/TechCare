<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Test extends Model {

  public function newTest($healthNumber, $type, $profil, $score, $passDate) {
    $sqlStatement = 'INSERT INTO test (healthNumber, type, profil, score, passDate) VALUES (:healthNumber, :type, :profil, :score, :passDate)';
    try {
      return $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber, 'type' => $type, 'profil' => $profil, 'score' => $score, 'passDate' => $passDate));
    } catch (ConfigException $e) {

    }
  }

  public function addComment($comment, $healthNumber) {
    $sqlStatement = 'UPDATE test SET comment = :comment WHERE healthNumber = :healthNumber';
    try {
      return $this->executeRequest($sqlStatement, array('comment' => $comment, 'healthNumber' => $healthNumber));
    } catch (ConfigException $e) {

    }
  }

  public function getUserTests($healthNumber) {
    $sqlStatement = 'SELECT * FROM test WHERE healthNumber = :healthNumber ORDER BY passDate DESC';
  try {
    return $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber))->fetchAll(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }

  }

}
