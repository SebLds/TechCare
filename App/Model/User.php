<?php

<<<<<<< HEAD
namespace App\Model\RegisterModel;

use PDO;
use src\Model;

class User extends Model {

  public function __construct() {
    $this->user = new User();
  }

  public function CheckMailExists($mail) {
      $sqlStatement = "SELECT * FROM users WHERE mail = ?, $mail";
      return $this->executeRequest($sqlStatement,null,1)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CheckHealthNumber($healthNumber) {
      $sqlStatement = "SELECT * FROM users WHERE healthNumber = ?, $healthNumber";
      return $this->executeRequest($sqlStatement,null,1)->fetchAll(PDO::FETCH_OBJ);
  }

  public function AddUser() {
    $sqlStatement = "INSERT INTO users SET firstName = ?, lastName = ?, birthdate = ?, mail = ?, password = ?; doctor = ?; healthNumber = ?";
    return $this->executeRequest($sqlStatement,null,1)->fetchAll(PDO::FETCH_OBJ);
  }

}

?>
=======

use src\Model;

class User extends Model
{

}
>>>>>>> master
