<?php

namespace App\Model;
use DateInterval;
use DateTime;
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
  public function getNbTests(){
      $sqlStatement='SELECT COUNT(*) as count FROM test';
      try {
          return $this->executeRequest($sqlStatement)->fetch(PDO::FETCH_OBJ)->count;
      } catch (ConfigException $e) {
      }
  }
  public function getNbTestsByTime($interval){
      $date = new DateTime(str_replace("/","-",Model::getDate()));
      $date->sub(new DateInterval($interval));
      $date=$date->format('d-m-Y H:i:s');
      try {
          return $this->executeRequest("SELECT COUNT(*) as count FROM test WHERE passDate>= :date ", array('date' => $date))->fetch(PDO::FETCH_OBJ)->count;
      } catch (ConfigException $e) {
      }
  }


  public function getListScoreTest($typeScore){
      $sqlStatement='SELECT score FROM test WHERE type = :typeScore';
      try {
          $listScoreTest=[];
          for ($i=0;$i<count($this->executeRequest($sqlStatement,array('typeScore' => $typeScore))->fetchAll(PDO::FETCH_OBJ));$i++){
              $listScoreTest[]=$this->executeRequest($sqlStatement,array('typeScore' => $typeScore))->fetchAll(PDO::FETCH_OBJ)[$i]->score;
          }
          return $listScoreTest;
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

  public function getDoctorTests($doctor) {
    $sqlStatement = 'SELECT * FROM test WHERE doctor = :doctor ORDER BY passDate DESC';
  try {
    return $this->executeRequest($sqlStatement, array('doctor' => $doctor))->fetchAll(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }

  }

}
