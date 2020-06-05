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
      $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber, 'doctor' => $doctor, 'type' => $type, 'profil' => $profil, 'score' => $score, 'passDate' => $passDate));
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
          $scores = $this->executeRequest($sqlStatement, array('typeScore' => $typeScore))->fetchAll(PDO::FETCH_OBJ);
      } catch (ConfigException $e) {
      }
      $size=count($scores);
      $listScoreTest=[];
      for ($i=0;$i<$size;$i++){
          $listScoreTest[]=$scores[$i]->score;
      }
      return $listScoreTest;
  }

  public function addComment($comment, $idTest) {
    $sqlStatement = 'UPDATE test SET comment = :comment WHERE ID_Test = :idTest';
    try {
      return $this->executeRequest($sqlStatement, array('comment' => $comment, 'idTest' => $idTest));
    } catch (ConfigException $e) {

    }
  }

  public function getUserTests($healthNumber) {
    $sqlStatement = 'SELECT * FROM test WHERE healthNumber = :healthNumber ORDER BY ID_Test DESC LIMIT 10';
  try {
    return $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber))->fetchAll(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }

  }

  public function getRecentTest($healthNumber) {
    $sqlStatement = 'SELECT * FROM test WHERE healthNumber = :healthNumber ORDER BY ID_Test';
  try {
    $test = $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber))->fetch(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }

  $test = [
    'score' => $test->score,
    'type' =>$test->type,
    'id'=> $test->ID_Test
  ];

  return $test;

  }

  public function getDoctorTests($doctor) {
    $sqlStatement = 'SELECT * FROM test WHERE doctor = :doctor ORDER BY ID_Test DESC LIMIT 10';
  try {
    return $this->executeRequest($sqlStatement, array('doctor' => $doctor))->fetchAll(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }
  }
  public function getTestByDate($date){
      $sqlStatement = 'SELECT * FROM test WHERE passDate=:passDate';
      try {
          return $this->executeRequest($sqlStatement, array('passDate' => $date))->fetch(PDO::FETCH_OBJ);
      } catch (ConfigException $e) {
      }
  }

}
