<?php
namespace App\Model\Forum;

use Exception;
use PDO;
use src\Config\ConfigException;
use src\Model;


class Tag extends Model
{




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
    public function getThreadsTagById($idTag){
        $sqlStatement = 'SELECT ID_Thread FROM post WHERE ID_Tag = :idTag';
        $threadList=[];
        $thread = new Thread();
        try {
            for ($i=0;$i<count($this->executeRequest($sqlStatement, array('idTag' => $idTag))->fetchAll(PDO::FETCH_OBJ));$i++){
                $idThread = (int) $this->executeRequest($sqlStatement, array('idTag' => $idTag))->fetchAll(PDO::FETCH_OBJ)[$i]->ID_Thread;
                $threadTitle=$thread->getThread($idThread)->Thread_Title;
                $threadList[]=$threadTitle;
            }
        } catch (ConfigException $e) {
        }
        return $threadList;

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




    public function getTag($idTag)
    {
        $sqlStatement = 'SELECT * FROM users WHERE id = :id';

        try {
            $tag = $this->executeRequest($sqlStatement, array($idTag));
        } catch (ConfigException $e) {
            // mettre page d'erreur
        }
        if ($tag->rowCount() > 0)
            return $tag->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune catégorie ne correspond à l'identifiant '$idTag'");
    }

    public function getCountTags()
    {
        $sqlStatement = 'select'. 'count(*) as nbBillets from Tag';
        $result = $this->executeRequest($sqlStatement);
        $ligne = $result->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }

    public function addTag($Tag_Title, $Tag_description, $Creation_Date, $Edit_Date=null) {
        $sqlStatement = 'INSERT INTO tag (Tag_Title, Tag_description, Creation_Date, Edit_Date) VALUES (:Tag_Title, :Tag_description, :Creation_Date, :Edit_Date)';
        try {
            return $this->executeRequest($sqlStatement, array('Tag_Title' => $Tag_Title, 'Tag_description' => $Tag_description, 'Creation_Date' => $Creation_Date, 'Edit_Date' => $Edit_Date));
        } catch (ConfigException $e) {
        }
    }

    public function deleteTag($Tag_Title) {
        $sqlStatement = 'DELETE FROM tag WHERE Tag_Title = :Tag_Title';
        try {
            return $this->executeRequest($sqlStatement, array('Tag_Title' => $Tag_Title));
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
