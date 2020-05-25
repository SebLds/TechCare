<?php

namespace App\Model;
use DateTime;
use PDO;
use src\Config\ConfigException;
use src\Model;

class User extends Model {

    public function getUsers(){
        $sqlStatement = 'SELECT * FROM users';
        try {
            return $this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
    }
    public function getNbUsers(){
        $sqlStatement='SELECT COUNT(*) as count FROM users';
        try {
            return $this->executeRequest($sqlStatement)->fetch(PDO::FETCH_OBJ)->count;
        } catch (ConfigException $e) {
        }
    }
    public function getNbUsersByStatus($status){
        $sqlStatement='SELECT COUNT(*) as count FROM users WHERE status= :status';
        try {
            return $this->executeRequest($sqlStatement,array('status'=> $status))->fetch(PDO::FETCH_OBJ)->count;
        } catch (ConfigException $e) {
        }
    }

    public function getAgeListPatient(){
        $sqlStatement='SELECT birthdate FROM users WHERE status=1';
        try {
            $ageListPatient=[];
            for($i=0;$i<count($this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ));$i++){
                $date=substr(Model::getDate(),0,10);
                $birthdate=$this->executeRequest($sqlStatement)->fetchAll(PDO::FETCH_OBJ)[$i]->birthdate;
                $date = new DateTime(Model::convertDate($date));
                $birthdate = new DateTime(Model::convertDate($birthdate));
                $agePatient = $date->diff($birthdate);
                $ageListPatient[]=$agePatient->format('%y');
            }
        } catch (ConfigException $e) {
        }
        return $ageListPatient;
    }

    public function getID($mail) {
        try {
            $sqlStatement = 'SELECT ID_Users FROM users WHERE mail = :mail';
        } catch (ConfigException $e) {
        }
        $user = $this -> executeRequest($sqlStatement, array('mail' => $mail))->fetch(PDO::FETCH_OBJ);
        return $user->ID_Users;
    }

    public function getStatus($ID) {
        try {
            $sqlStatement = 'SELECT status FROM users WHERE ID_Users = :ID_Users';
        } catch (ConfigException $e) {
        }
        $user = $this -> executeRequest($sqlStatement, array('ID_Users' => $ID))->fetch(PDO::FETCH_OBJ);
        return $user->status;
    }

    public function getHealthNumber($ID) {
        try {
            $sqlStatement = 'SELECT healthNumber FROM users WHERE ID_Users = :ID_Users';
        } catch (ConfigException $e) {
        }
        $user = $this -> executeRequest($sqlStatement, array('ID_Users' => $ID))->fetch(PDO::FETCH_OBJ);
        return $user->healthNumber;
    }

    public function getFirstName($ID) {
      try {
          $sqlStatement = 'SELECT firstName FROM users WHERE ID_Users = :ID_Users';
        } catch (ConfigException $e) {
        }
        $user = $this -> executeRequest($sqlStatement, array('ID_Users' => $ID))->fetch(PDO::FETCH_OBJ);
        return $user->firstName;
    }

    public function getDoctor($ID) {
        try {
            $sqlStatement = 'SELECT lastName FROM users WHERE ID_Users = :ID_Users';
        } catch (ConfigException $e) {
        }
        $user = $this -> executeRequest($sqlStatement, array('ID_Users' => $ID))->fetch(PDO::FETCH_OBJ);
        return $user->lastName;
    }

    public function addNewUser($status, $firstName, $lastName, $mail, $password, $birthdate, $doctor=null, $company=null, $healthNumber=null, $registrationdate) {
        $sqlStatement = 'INSERT INTO users (status, firstName, lastName, mail, password, birthdate, doctor, company, healthNumber, registrationdate) VALUES (:status, :firstName, :lastName, :mail, :password, :birthdate, :doctor, :company, :healthNumber, :registrationdate)';
        try {
            return $this->executeRequest($sqlStatement, array('status' => $status, 'firstName' => $firstName, 'lastName' => $lastName, 'mail' => $mail, 'password' => $password, 'birthdate' => $birthdate, 'doctor' => $doctor, 'company' => $company, 'healthNumber' => $healthNumber, 'registrationdate' => $registrationdate));
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

    public function getProfil($ID) {
        $sqlStatement = 'SELECT * FROM users WHERE ID_Users = :ID_Users';
        try {
            $user = $this->executeRequest($sqlStatement, array('ID_Users' => $ID))->fetch(PDO::FETCH_OBJ);
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

        return $data;
    }

    public function modifyProfil($firstName, $lastName, $mail, $healthNumber, $doctor, $ID_Users) {
        $sqlStatement = 'UPDATE users SET firstName = :firstName, lastName = :lastName; mail = :mail, healthNumber = :healthNumber, doctor = :doctor WHERE ID_Users = :ID_Users';
        try {
            return $this->executeRequest($sqlStatement, array('firstName' => $firstName, 'lastName' => $lastName, 'mail' => $mail, 'healthNumber' => $healthNumber, 'doctor' => $doctor, 'ID_Users' => $ID_Users));
        } catch (ConfigException $e) {
        }
    }

    public function getUserInfo($healthNumber) {
        $sqlStatement = 'SELECT * FROM users WHERE healthNumber = :healthNumber';
        try {
            $user = $this->executeRequest($sqlStatement, array('healthNumber' => $healthNumber))->fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) {
        }
        $data = [
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'birthdate' => $user->birthdate,
            'healthNumber' => $user->healthNumber,
            'mail' => $user->mail,
        ];
        return $data;
    }


public function findUserByLastName($lastName, $search) {
  $sqlStatement = 'SELECT * FROM users WHERE lastName = :lastName LIKE '%$search%''->fetchAll(PDO::FETCH_OBJ);
  return $this->executeRequest($sqlStatement, array('lastName' => $lastName));
}


}
