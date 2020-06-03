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

    public function addThread($Thread_Title, $Creation_Date, $Edit_Date=null) {
        $sqlStatement = 'INSERT INTO thread (Thread_Title, Creation_Date, Edit_Date) VALUES (:Thread_Title, :Creation_Date, :Edit_Date)';
        try {
            return $this->executeRequest($sqlStatement, array('Thread_Title' => $Thread_Title, 'Creation_Date' => $Creation_Date, 'Edit_Date' => $Edit_Date));
        } catch (ConfigException $e) {
        }
    }

    public function deleteThread($Thread_Title) {
        $sqlStatement = 'DELETE FROM thread WHERE Thread_Title = :Thread_Title';
        try {
            return $this->executeRequest($sqlStatement, array('Thread_Title' => $Thread_Title));
        } catch (ConfigException $e) {
        }
    }

}
