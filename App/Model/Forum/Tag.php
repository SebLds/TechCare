<?php
namespace App\Model\Forum;

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
            throw new \Exception("Aucune catégorie ne correspond à l'identifiant '$idTag'");
    }

    public function getCountTags()
    {
        $sqlStatement = 'select'. 'count(*) as nbBillets from Tag';
        $result = $this->executeRequest($sqlStatement);
        $ligne = $result->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }

}