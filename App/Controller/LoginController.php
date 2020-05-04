<?php

use src\Controller;

class LoginController extends Controller {

  public function index()
  {

    // Vérification que la variable $_POST contienne des informations
    if (!empty($_POST)) {
      extract($_POST);

      // On se place dans le formumaire de connexion
      if (isset($_POST['login'])) {

        $mail = (string) htmlspecialchars($mail);
        $password = (string) htmlspecialchars($password);

        // Vérification du mail
        if (!empty($mail)) {
          if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $error_mail = ("L'adresse email est invalide");
          }
        } else {
          $error_mail = ("Veuillez renseigner votre mail");
        }


      }
  }
}

