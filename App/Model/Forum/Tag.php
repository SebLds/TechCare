<?php
namespace App\Model\Forum;

use Exception;
use PDO;
use src\Config\ConfigException;
use src\Model;


class Tag extends Model
{


    public function getTagById($id){
        $sqlStatement = 'SELECT * FROM Tag WHERE ID_Tag=:id';
        try {
            return $this->executeRequest($sqlStatement,array('id'=>$id))->fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }

    public function getTags()
    {
        $sqlStatement = 'SELECT * FROM Tag';

        try {
            return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
               }
    }
    public function getNbThreadsTagById($idTag){
        $sqlStatement = 'SELECT COUNT(*) as count FROM post WHERE ID_Tag = :idTag';
        try {
            return (int)$this->executeRequest($sqlStatement, array('idTag' => $idTag))->fetch(PDO::FETCH_OBJ)->count;
        } catch (ConfigException $e) {
        }
    }



    public function getNbRepliesTagById($idTag){
        $sqlStatement = 'SELECT ID_Thread FROM post WHERE ID_Tag = :idTag ';
        try {
            $threadsList = $this->executeRequest($sqlStatement, array('idTag' => $idTag))->fetchAll(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
        $count=0;
        for ($i=0;$i<count($threadsList);$i++){
        $sql = 'SELECT COUNT(*) as count FROM reply WHERE ID_Thread =:idThread';
            try {
                $count = $count + $this->executeRequest($sql, array('idThread' => $threadsList[$i]->ID_Thread))->fetch(PDO::FETCH_OBJ)->count;
            } catch (ConfigException $e) {
                //mettre page d'erreur
            }
        }
        return $count;
    }


    public function addTag($Tag_Title, $Tag_description, $Creation_Date) {
        $sqlStatement = 'INSERT INTO tag (Tag_Title, Tag_description, Creation_Date, Edit_Date) VALUES (:Tag_Title, :Tag_description, :Creation_Date, :Edit_Date)';
        try {
            $this->executeRequest($sqlStatement, array('Tag_Title' => $Tag_Title, 'Tag_description' => $Tag_description, 'Creation_Date' => $Creation_Date, 'Edit_Date' => $Creation_Date));
        } catch (ConfigException $e) {
        }
    }
    public function getTagByTitle($title){
        $sqlStatement = 'SELECT * FROM tag WHERE Tag_Title=:Tag_Title';
        try {
            return $this->executeRequest($sqlStatement,array('Tag_Title'=>$title))->fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }

    public function deleteTag($Tag_Title) {
        $sqlStatement = 'DELETE FROM tag WHERE Tag_Title = :Tag_Title';
        $query ='DELETE FROM post WHERE ID_Tag = :ID_Tag';
        $sql='SELECT * FROM thread t INNER JOIN post p ON p.ID_Thread = t.ID_Thread WHERE ID_Tag= :ID_Tag';
        $sqlDelete='DELETE FROM reply WHERE ID_Thread = :ID_Thread';
        $sqlDel= 'DELETE FROM thread WHERE ID_Thread = :ID_Thread';
        $idTag=$this->getTagByTitle($Tag_Title)->ID_Tag;
        $listThread=$this->executeRequest($sql,array('ID_Tag'=>$idTag))->fetchAll(PDO::FETCH_OBJ);
        $size=count($listThread);
        $listThreadToDel=[];
        try {
            for($i=0;$i<$size;$i++){
                $listThreadToDel[]=$listThread[$i]->ID_Thread;
            }
            for($i=0;$i<count($listThreadToDel);$i++){
                $this->executeRequest($sqlDel,array('ID_Thread'=>$listThreadToDel[$i]));
                $this->executeRequest($sqlDelete,array('ID_Thread'=>$listThreadToDel[$i]));
            }
            $this->executeRequest($sqlStatement, array('Tag_Title' => $Tag_Title));
            $this->executeRequest($query,array('ID_Tag'=>$idTag));
        } catch (ConfigException $e) {
        }
    }

    public function modifyTag($Tag_Title) {
        $sqlStatement = 'UPDATE tag SET Tag_Title = :Tag_Title, Tag_description WHERE Tag_Title = :Tag_Title';
        try {
            return $this->executeRequest($sqlStatement, array('Tag_Title' => $Tag_Title, 'Tag_description' => $Tag_description));
        } catch (ConfigException $e) {
        }
    }



}
