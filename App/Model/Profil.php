<?php

namespace App\Model;
use DateInterval;
use DateTime;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Profil extends Model {

  public function getProfil() {
    $sqlStatement = 'SELECT * FROM faq';
    try {
      return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
    } catch (ConfigException $e) {
    }
  }

  public function addProfil($question, $answer) {
    $sqlStatement = 'INSERT INTO faq (question, answer, editDate) VALUES (:question, :answer, :editDate)';
    try {
      $date = Model::getDate();
      return $this->executeRequest($sqlStatement, array('question' => $question, 'answer' => $answer, 'editDate' => $date));
    } catch (ConfigException $e) {
    }
  }

  public function deleteProfil($question) {
    $sqlStatement = 'DELETE FROM faq WHERE question = :question';
    try {
      return $this->executeRequest($sqlStatement, array('question' => $question));
    } catch (ConfigException $e) {
    }
  }

  public function modifyProfil($question, $answer) {
    $sqlStatement = 'UPDATE faq SET question = :question, answer = :answer WHERE question = :question OR answer = :answer';
    try {
      return $this->executeRequest($sqlStatement, array('question' => $question, 'answer' => $answer));
    } catch (ConfigException $e) {
    }
  }

}
