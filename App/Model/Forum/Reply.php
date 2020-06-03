<?php

namespace App\Model\Forum;

use src\Model;

class Reply extends Model
{

  public function getReplies() {
      $sqlStatement = 'SELECT * FROM reply';

      try {
          return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
      } catch (ConfigException $e) {
      }
  }

  public function getReply($idThread){
      $sqlStatement = 'SELECT * FROM reply WHERE ID_Thread = :idThread';
      try {
          return $this->executeRequest($sqlStatement,array('idThread' => $idThread))->fetch(PDO::FETCH_OBJ);
      } catch (ConfigException $e) {
      }
  }

}
