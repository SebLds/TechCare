<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Test extends Model {

  public function newTest($healthNumber, $doctor, $type, $profil, $score, $passDate) {
    $sqlStatement = 'INSERT INTO test (healthNumber, doctor, type, profil, score, passDate) VALUES (:healthNumber, :doctor, :type, :profil, :score, :passDate)';
    try {
      return $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber, 'doctor' => $doctor, 'type' => $type, 'profil' => $profil, 'score' => $score, 'passDate' => $passDate));
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

  public function getRecentTest($healthNumber) {
    $sqlStatement = 'SELECT * FROM test WHERE healthNumber = :healthNumber ORDER BY passDate DESC';
  try {
    $test = $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber))->fetch(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }

  $test = [
    'score' => $test->score,
    'type' =>$test->type,
  ];

  return $test;

  }

  public function getDoctorTests($doctor) {
    $sqlStatement = 'SELECT * FROM test WHERE doctor = :doctor ORDER BY passDate DESC';
  try {
    return $this->executeRequest($sqlStatement, array('doctor' => $doctor))->fetchAll(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }

  }

}
