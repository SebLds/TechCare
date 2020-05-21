<?php

namespace App\Controller;
use src\Controller;
use src\Session;
use App\Model\User;


class LoginController extends Controller {

  private User $user;

  public function __construct() {
        $this->user = new User();
  }

  public function index() {
      $this->generateView(array(),'index');
  }

  public function login() {

    // Vérification que la variable $_POST contienne des informations
    if (!empty($_POST)) {
      extract($_POST);

      // On se place dans le formumaire de connexion
      if (isset($_POST['login'])) {

        $data = [
          'mail' => (string) htmlspecialchars($mail),
          'password' => (string) htmlspecialchars($password),
        ];

        $errors = [];

        // Vérification du mail
        if (!empty($data['mail'])) {
          if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['error_mail'] = "L'adresse email est invalide";
          }
        } else {
          $errors['error_mail'] = "Veuillez renseigner votre mail";
        }

        //Vérification combinaison mail et mot de passe
        if(empty($errors)) {
          $log = $this->user->checkLogin($data['mail'], $data['password']);
          if ($log) {
            $ID = $this->user->getID($data['mail']);
            Session::getInstance()->setAttribute('ID_User', $ID);
            header("Location: /dashboard");
          } else {
            $errors['error_login'] = "Votre mail et/ou votre mot de passe est incorrect";
            $this->generateView($errors,'index');
          }
        } else {
          $this->generateView($errors,'index');
        }

      }
    }
  }

}
