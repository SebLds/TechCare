<?php

namespace App\Model\Forum;
use PDO;
use src\Config\ConfigException;
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

    public function getThreadsTagById($idTag){

        $sqlStatement = 'SELECT ID_Thread FROM post WHERE ID_Tag = :idTag';
        $threadList=[];
        $query=$this->executeRequest($sqlStatement, array('idTag' => $idTag))->fetchAll(PDO::FETCH_OBJ);
        $size=count($query);
        try {
            if(!empty($query)){
                for ($i=0;$i<$size;$i++){
                    $idThread = $query[$i]->ID_Thread;
                    $threadTitle=$this->getThread($idThread);
                    $threadList[]=$threadTitle;
                }
            }
        } catch (ConfigException $e) {
        }
        return $threadList;

    }
    public function getThread($idThread){
        $sqlStatement = 'SELECT * FROM Thread WHERE ID_Thread = :idThread';
        try {
            return $this->executeRequest($sqlStatement,array('idThread' => $idThread))->fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }
    public function getThreadByTitle($threadTitle){
        $sqlStatement = 'SELECT * FROM thread WHERE Thread_Title= :threadTitle';
        try {
            return $this->executeRequest($sqlStatement,array('threadTitle' => $threadTitle))->fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }


    public function addThread($Thread_Title, $Creation_Date) {
        $sqlStatement = 'INSERT INTO thread (Thread_Title, Creation_Date, Edit_Date) VALUES (:Thread_Title, :Creation_Date, :Edit_Date)';
        try {
            $this->executeRequest($sqlStatement, array('Thread_Title' => $Thread_Title, 'Creation_Date' => $Creation_Date, 'Edit_Date' => $Creation_Date));
        } catch (ConfigException $e) {
        }
    }
    public function addThreadIntoPost($idThread,$idTag){
        $sqlStatement='INSERT INTO post (ID_Tag,ID_Thread) VALUES (:ID_Tag,:ID_Thread)';
        try {
            $this->executeRequest($sqlStatement, array('ID_Tag' => $idTag, 'ID_Thread' => $idThread));
        } catch (ConfigException $e) {
        }
    }


    public function deleteThread($Thread_Title) {

        $sqlStatement = 'DELETE FROM thread WHERE Thread_Title = :Thread_Title';
        $query ='DELETE FROM post WHERE ID_Thread = :ID_Thread';
        $sql= 'DELETE FROM reply WHERE ID_Thread = :ID_Thread';
        $idThread=$this->getThreadByTitle($Thread_Title)->ID_Thread;
        try {
            $this->executeRequest($sqlStatement, array('Thread_Title' => $Thread_Title));
            $this->executeRequest($query, array('ID_Thread' => $idThread));
            $this->executeRequest($sql, array('ID_Thread' => $idThread));
        } catch (ConfigException $e) {
        }
    }

}
