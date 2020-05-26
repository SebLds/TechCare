<?php

namespace App\Controller;
use src\Controller;
use App\Model\User;

class ProfilController extends Controller {

  private User $user;

  public function __construct() {
        $this->user = new User();
  }

  public function index() {
    $data = $this->user->getProfil($_SESSION['ID_User']);
    $this->generateView($data,'index');
  }

  public function change() {

    if (!empty($_POST)) {
      extract($_POST);

      if (isset($_POST['change'])) {


        $data = [
          'newFirstName' => (string) htmlspecialchars(ucfirst(trim($newFirstName))),
          'newLastName' => (string) htmlspecialchars(strtoupper(trim($newLastName))),
          'newMail' => (string) htmlspecialchars(strtolower(trim($newMail))),
          //'newPassword' => (string) htmlspecialchars(trim($newPassword)),
          //'newPasswordConfirm' => (string) htmlspecialchars(trim($newPasswordConfirm)),
          'day' => (int) htmlspecialchars(trim($day)),
          'month' => (int) htmlspecialchars(trim($month)),
          'year' => (int) htmlspecialchars(trim($year)),
          'newDoctor' => htmlspecialchars(trim($newDoctor)),
          'newHealthNumber' => htmlspecialchars(trim($newHealthNumber)),
          'birthdate' => $day .'/'. $month .'/'. $year,
        ];

        $errors = [];

        if (isset($data['newFirstName'])) {
          if (!ctype_alpha($data['newFirstName'])) {
            $errors['error_firstName'] = "Caractères invalides";
          }
        }

        if (isset($data['newLastName'])) {
          if (!ctype_alpha($data['newLastName'])) {
            $errors['error_firstName'] = "Caractères invalides";
          }
        }

        if(empty($errors)) {
          $this->user->modifyProfil($data['newFirstName'], $data['newLastName'], $data['newMail'], $data['newDoctor'], $data['newHealthNumber'], 10);
          $data = $this->user->getProfil($_SESSION['ID_User']);
          $this->generateView($data,'index');
        } else {
          $data = [$data, $errors];
          $this->generateView($data,'index');
        }

      }
    }

  }

}
