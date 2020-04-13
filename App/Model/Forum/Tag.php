<?php


namespace App\Model\Forum;


use APP\Model;

class Tag extends Model
{

    /**
     * Fournit les services d'accès aux genres musicaux
     *
     * @author Baptiste Pesquet
     */


    /** Renvoie la liste des billets du blog
     *
     * @return bool|false|\PDOStatement
     * @throws \ConfigException
     */
    public function getTags()
    {
        $sqlStatement = 'select ID_Tag as id, Creation_Date as date,'
            . ' Tag_Title as titre from Tag'
            . ' order by ID_Tag desc';
        return $this->executeRequest($sqlStatement);
    }

    /** Renvoie les informations sur un billet
     *
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     * @throws \ConfigException
     */
    public function getTag($idTag)
    {
        $sqlStatement = 'select ID_Tag as id, Creation_Date as date,'
            . ' Tag_Title as titre from Tag'
            . ' where ID_Tag=?';
        $tag = $this->executeRequest($sqlStatement, array($idTag));
        if ($tag->rowCount() > 0)
            return $tag->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune catégorie ne correspond à l'identifiant '$idTag'");
    }

    /**
     * Renvoie le nombre total de billets
     *
     * @return int Le nombre de billets
     * @throws \ConfigException
     */
    public function getCountTags()
    {
        $sqlStatement = 'select'. 'count(*) as nbBillets from Tag';
        $result = $this->executeRequest($sqlStatement);
        $ligne = $result->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }

}