<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Dashboard extends Model
{
    public function getCountTotalTestsUser($idUser)
    {
        try {
            return $this -> executeRequest('SELECT count(idPretest) as nbTests FROM test WHERE idUtilisateur = ?', $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getCountTotalTestsUser($id)


    public function getLastScore($idUser, $value) //Voir avec $value pour faire -1 lorsque l'on veut l'AVANT-dernier test, etc..
    {
        try {
            return $this -> executeRequest("SELECT Score FROM test WHERE (idUtilisateur = ? AND idPretest = MAX(idPretest)-$value", $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getLastScore($idUser, $value)


    public function getLastTypeTest($idUser, $value) //Récupérer le type du dernier test seulement
    {
        try {
            return $this -> executeRequest("SELECT Type as typeTest FROM test WHERE (idUtilisateur = ? AND idPretest = MAX(idPretest)-$value", $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getLastTypeTest($idUser, $value)


    public function getLastCommentaire($idUser, $value) //Récupérer le commentaire du dernier test
    {
        try {
            return $this -> executeRequest("SELECT commentaire FROM test WHERE (idUtilisateur = ? AND idPretest = MAX(idPretest)-$value", $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getLastCommentaire($idUser, $value)
}