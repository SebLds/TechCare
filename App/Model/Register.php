<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Register extends Model {

    public function addNewUser($data) {
      $sqlStatement = 'INSERT INTO users (firstName, lastName, mail, password, birthdate, doctor, healthNumber) VALUES (:firstName, :lastName, :mail, :password, :birthdate, :doctor, :healthNumber)';
      try {
        return $this -> executeRequest($sqlStatement);
      }

    }

}
