<?php

use src\Controller;

class RegisterController extends Controller {

  private User $user;
  public $errors = [];

  public function __construct() {
        $this->user = new User();
    }

  public function index(){
    $this->generateView();
// TODO: la page du formulaire non rempli generateView ('index') ca va aller cherche le fichier de vue App/View/Register/index.php
  }
  public function registrationValidated() {
    // ca correspond à la page de validation
  }

  public function click() {
    // TODO : si ya pas d'erreur ca insert dans la bdd via $this->user->create(array());
    // sinon ca redirige vers le formulaire avec msg d'erreurs via l'appel de la méthode erreur
  }

  private function checkFields($field, $typeField=null, $length){
    // TODO: il récupère le champ et vérifie sa validité (vide ou champ correct)
  /*
    email text password date numéro
    si c'est true // c'est good -> ca part dans la bdd
      return $field
    sinon
      selon le $typefield ca return un message d'erreur ca sera pas un sting ce sera une 'requete' vers le fichier json correspondant

    */
    $array= ["mail"=>"erreur ton mail pue",]

    if (!empty($_POST)) {
      extract($_POST);

      // On se place dans le formumaire d'inscription
      if (isset($_POST['register'])) {

        $firstName = (string) htmlspecialchars(ucfirst(trim($firstName)));
        $lastName = (string) htmlspecialchars(strtoupper(trim($lastName)));
        $mail = (string) htmlspecialchars(strtolower(trim($mail)));
        $password = (string) htmlspecialchars(trim($password));
        $passwordConfirm = (string) htmlspecialchars(trim($passwordConfirm));
        $day = (int) htmlspecialchars(trim($day));
        $month = (int) htmlspecialchars(trim($month));
        $year = (int) htmlspecialchars(trim($year));
        $doctor = htmlspecialchars(trim($doctor));
        $birthdate = $day .'/'. $month .'/'. $year;

        // Vérification du prénom
        if (!empty($firstName)) {
          if (!ctype_alpha($firstName)) {
            $error_firstName = ("Caractères invalides");
          }
        } else {
          $error_firstName = ("Veuillez renseigner votre prénom");
        }

        // Vérification du nom
        if (!empty($lastName)) {
          if (!ctype_alpha($lastName)) {
            $error_lastName = ("Caractères invalides");
          }
        } else {
          $error_lastName = ("Veuillez renseigner votre nom");
        }

        // Vérification du mail
        if (!empty($mail)) {
          if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $error_mail = ("L'adresse email est invalide");
          }
          if ($mail != $mailConfirm) {
            $error_mailConfirm = ("Les adresses mails ne correspondent pas");
          }
        } else {
          $error_mail = ("Veuillez renseigner votre mail");
        }

        // Vérification de la date de naissance
        if (!empty($day) || !empty($month) || !empty($year)) {
          if (!checkdate($month, $day, $year)) {
            $error_birthdate = ("Veuillez entrer une date valide");
          }
        } else {
          $error_birthdate = ("Veuillez renseigner votre date de naissance");
        }

        // Vérification et hashage du mot de passe
        if (!empty($password)) {
          if ($password != $passwordConfirm) {
            $error_passwordConfirm = ("Les mots de passe ne correspondent pas");
          } else {
            $passwordHash = hash('sha256', $password);
          }
        } else {
          $error_password = ("Veuillez renseigner un mot de passe");
        }

        // Vérification du nom du médecin
        if (!empty($doctor)) {
          if (!ctype_alpha($doctor)) {
            $error_doctor = ("Caractères invalides");
          }
        } else {
          $error_doctor = ("Veuillez renseigner le nom de votre médecin");
        }

        // Vérification du numéro de sécurité sociale
        if (!empty($healthNumber)) {
          if (!ctype_alpha($doctor)) {
            $error_doctor = ("Caractères invalides");
          }
        } else {
          $error_healthNumber = ("Veuillez renseigner votre numéro de sécurité sociale");
        }

        // Vérification de l'acceptation des CGU
        if (!isset($_POST['check'])) {
          $error_cgu = ("Veuillez accepter les CGU");
        }
      }

    }
  }


  public function errorForm() {
    // TODO: la page index avec les msgs d'erreurs
    $array=$this->checkFields();
    if ($array!=true){
      $this->generateView($array,"index");
    }

  }









}
