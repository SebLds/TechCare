<?php

namespace App\Model\Forum;
use PDO;
use src\Model;

class Thread extends Model
{
    public function getThreads()
    {
        $sqlStatement = 'SELECT * FROM Thread';

        try {
            return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }
    public function getThread($idThread){
        $sqlStatement = 'SELECT * FROM Thread WHERE ID_Thread = :idThread';
        try {
            return $this->executeRequest($sqlStatement,array('idThread' => $idThread))->fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }

}