<?php
namespace App\Model\Forum;

use PDO;
use src\Model;

class Tag extends Model
{




    public function getTags()
    {
        $sqlStatement = 'SELECT * FROM Tag';

        return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
    }


    public function getTag($idTag)
    {
        $sqlStatement = 'SELECT * FROM users WHERE id = :id';

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