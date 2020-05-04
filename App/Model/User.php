<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class User extends Model
{
    public function getIdentity($idUser)
    {
        try {
            return $this -> executeRequest('SELECT Nom, Prenom FROM utilisateur WHERE idUtilisateur = ?', $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getIdentity($idUser)


    public function getCompleteProfil($idUser)
    {
        try {
            return $this -> executeRequest('SELECT * FROM utilisateur WHERE idUtilisateur = ?', $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getComplete($idUser)


    public function getModifyProfil($idUser, $mail, $password, $name, $surname, $address, $type, $tel)
    {
        try {
            return $this -> executeRequest('UPDATE utilisateur SET Email = ?, Motdepasse = ?, Prenom = ?, Nom = ?, Adresse = ?, "Type" = ?, Tel = ? WHERE idUtilisateur = ?'.$idUser, array($mail, $password, $name, $surname, $address, $type, $tel)) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getModifyProfil($idUser, $mail, $password, $name, $surname, $address, $type, $tel)


    public function getSpecificTest($idUser)
    {
        try {
            return $this -> executeRequest('SELECT * FROM test WHERE idUtilisateur = ? AND (NumeroSecu = ? OR idProfil = ? OR Examinateur = ? OR "Type" = ? OR Score = ?)', $idUser) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function getSpecificTest($idUser)

} //class User extends Model