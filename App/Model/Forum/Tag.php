<?php
namespace App\Model\Forum;

use PDO;
use src\Model;

class Tag extends Model
{





    public function getTags()
    {
        $sqlStatement = 'select ID_Tag, Creation_Date,'
            . ' Tag_Title from Tag'
            . ' order by ID_Tag desc';
        return $this->executeRequest($sqlStatement,null,1)->fetchAll(PDO::FETCH_OBJ);
    }


    public function getTag($idTag)
    {
        $sqlStatement = 'select ID_Tag as id, Creation_Date as date,'
            . ' Tag_Title as titre from Tag'
            . "where ID_Tag=?";
        $tag = $this->executeRequest($sqlStatement, array($idTag));
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