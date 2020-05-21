<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class User extends Model {

    public function getID($mail) {
        try {
          $sqlStatement = 'SELECT ID_Users FROM users WHERE mail = :mail';
        } catch (ConfigException $e) {
        }
        return $this -> executeRequest($sqlStatement, array('mail' => $mail))->fetch(PDO::FETCH_OBJ);
    }


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

    public function addNewUser($status, $firstName, $lastName, $mail, $password, $birthdate, $doctor, $healthNumber, $registrationdate) {
      $sqlStatement = 'INSERT INTO users (status, firstName, lastName, mail, password, birthdate, doctor, healthNumber, registrationdate) VALUES (:status, :firstName, :lastName, :mail, :password, :birthdate, :doctor, :healthNumber, :registrationdate)';
      try {
        return $this->executeRequest($sqlStatement, array('status' => $status, 'firstName' => $firstName, 'lastName' => $lastName, 'mail' => $mail, 'password' => $password, 'birthdate' => $birthdate, 'doctor' => $doctor, 'healthNumber' => $healthNumber, 'registrationdate' => $registrationdate));
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

    public function checkHealthNumber($healthNumber) {
      $sqlStatement = 'SELECT * FROM users WHERE healthNumber = :healthNumber';
      try {
        $isHealthNumberExist = $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber));
      }  catch (ConfigException $e) {
      }
      if ($isHealthNumberExist->rowCount()>0) {
        return true;
      }
    }

    public function checkLogin($mail, $password) {
      $sqlStatement = 'SELECT * FROM users WHERE mail = :mail';
    try {
      $user = $this->executeRequest($sqlStatement, array('mail' => $mail))->fetch(PDO::FETCH_OBJ);
    } catch (ConfigException $e) {
    }

      $password_hash = $user->password;
      if (password_verify($password, $password_hash)) {
        return true;
      }
    }

    public function getProfil($mail) {
      $sqlStatement = 'SELECT * FROM users WHERE mail = :mail';
    try {
      $user = $this->executeRequest($sqlStatement, array('mail' => $mail))->fetch(PDO::FETCH_OBJ);
    } catch (ConfigException $e) {
    }

    $data = [
      'firstName' => $user->firstName,
      'lastName' => $user->lastName,
      'birthdate' => $user->birthdate,
      'mail' => $user->mail,
      'healthNumber' => $user->healthNumber,
      'doctor' => $user->doctor,
    ];

    $firstName = $user->firstName;

    return $firstName;
  }

  public function getStatus($mail) {
    $sqlStatement = 'SELECT * FROM users WHERE mail = :mail';
  try {
    $user = $this->executeRequest($sqlStatement, array('mail' => $mail))->fetch(PDO::FETCH_OBJ);
  } catch (ConfigException $e) {
  }
}



}
