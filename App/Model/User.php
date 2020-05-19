<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class User extends Model {

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

    public function addNewUser($data) {
      $sqlStatement = 'INSERT INTO users (firstName, lastName, mail, password, birthdate, doctor, healthNumber) VALUES (:firstName, :lastName, :mail, :password, :birthdate, :doctor, :healthNumber)';
      try {
        return $this->executeRequest($sqlStatement, array());
      } catch (ConfigException $e) {
      }
    }

    public function checkMail($mail) {
      $sqlStatement = 'SELECT * FROM users WHERE mail = :mail';
      try {
        $isMailExist = $this->executeRequest($sqlStatement, array('mail' => $mail));
      }  catch (ConfigException $e) {
      }
      if ($isMailExist->rowCount()>0) {
        return true;
      }
    }

    public function checkLogin($mail, $password) {
      $sqlStatement = 'SELECT * FROM users WHERE mail = :mail AND password = :password';
    try {
      $log = $this->executeRequest($sqlStatement, array('mail' => $mail, 'password' => $password));
    } catch (ConfigException $e) {
    }
    if ($log->rowCount()>0) {
      return true;
    }
  }

}
