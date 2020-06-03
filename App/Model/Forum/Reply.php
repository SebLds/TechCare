<?php

namespace App\Model\Forum;

use PDO;
use src\Config\ConfigException;
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

    public function addReply($ID_User, $Creation_Date,$Content,$ID_Thread)
    {
        $sqlStatement = 'INSERT INTO reply (ID_User, Creation_Date, Edit_Date,Content,ID_Thread) VALUES (:ID_User, :Creation_Date, :Edit_Date,:Content,:ID_Thread)';
        try {
            $this->executeRequest($sqlStatement, array('ID_User' => $ID_User, 'Creation_Date' => $Creation_Date, 'Edit_Date' => $Creation_Date,'Content'=>$Content,'ID_Thread'=>$ID_Thread));
        } catch (ConfigException $e) {
        }
    }

}
