<?php

namespace App\Model;
use DateTime;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Faq extends Model {

  public function getFAQ() {
    $sqlStatement = 'SELECT * FROM r4bgjpcm5dhsnnye.faq';
    try {
      return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
    } catch (ConfigException $e) {
    }
  }

  public function addQuestion($question, $answer) {
    $sqlStatement = 'INSERT INTO r4bgjpcm5dhsnnye.faq (question, answer, editDate) VALUES (:question, :answer, :editDate)';
    try {
      $date = Model::getDate();
      return $this->executeRequest($sqlStatement, array('question' => $question, 'answer' => $answer, 'editDate' => $date));
    } catch (ConfigException $e) {
    }
  }

  public function deleteQuestion($question) {
    $sqlStatement = 'DELETE FROM r4bgjpcm5dhsnnye.faq WHERE question = :question';
    try {
      return $this->executeRequest($sqlStatement, array('question' => $question));
    } catch (ConfigException $e) {
    }
  }

  public function modifyQuestion($question, $answer) {
    $sqlStatement = 'UPDATE r4bgjpcm5dhsnnye.faq SET question = :question, answer = :answer WHERE question = :question OR answer = :answer';
    try {
      return $this->executeRequest($sqlStatement, array('question' => $question, 'answer' => $answer));
    } catch (ConfigException $e) {
    }
  }

}
