<?php

namespace App\Controller;
use src\Controller;
use src\Session;
use App\Model\User;
use App\Model\Test;

class AdminController extends Controller {

  public function index() {
    $this->generateView(array(), 'index');
  }

  public function addUserIndex() {
    $this->generateView(array(), 'AddUser');
  }

  public function addUser() {

    if (!empty($_POST)) {
      extract($_POST);

      if(isset($_POST['add'])) {

        $data = [
          'firstName' => (string) htmlspecialchars(ucfirst(trim($firstName))),
          'lastName' => (string) htmlspecialchars(strtoupper(trim($lastName))),
          'mail' => (string) htmlspecialchars(strtolower(trim($mail))),
          'mailConfirm' => (string) htmlspecialchars(strtolower(trim($mailConfirm))),
          'password' => (string) htmlspecialchars(trim($password)),
          'passwordConfirm' => (string) htmlspecialchars(trim($passwordConfirm)),
          'day' => (int) htmlspecialchars(trim($day)),
          'month' => (int) htmlspecialchars(trim($month)),
          'year' => (int) htmlspecialchars(trim($year)),
          'doctor' => (string) htmlspecialchars(trim($doctor)),
          'healthNumber' => htmlspecialchars(trim($healthNumber)),
          'birthdate' => $day .'/'. $month .'/'. $year,
        ];

        $errors = [];

          // Vérification du prénom
          if (!empty($data['firstName'])) {
            if (!ctype_alpha($data['firstName'])) {
              $errors['error_firstName'] = "Caractères invalides";
            }
          } else {
            $errors['error_firstName'] = "Veuillez renseigner votre prénom";
          }

          // Vérification du nom
          if (!empty($data['lastName'])) {
            if (!ctype_alpha($data['lastName'])) {
              $errors['error_lastName'] = "Caractères invalides";
            }
          } else {
            $errors['error_lastName'] = "Veuillez renseigner votre nom";
          }

          // Vérification du mail
          if (!empty($data['mail'])) {
            $checkmail = $this->user->checkMail($data['mail']);
            if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
              $errors['error_mail'] = "L'adresse email est invalide";
              if ($data['mail'] != $data['mailConfirm']) {
                $errors['error_mailConfirm'] = "Les adresses mails ne correspondent pas";
              }
            } elseif ($checkmail) {
              $errors['error_mail'] = "Cette adresse email est déjà associée à un compte";
            }
          } else {
            $errors['error_mail'] = "Veuillez renseigner votre mail";
          }

          // Vérification de la date de naissance
          if (!empty($data['day']) || !empty($data['month']) || !empty($data['year'])) {
            if (!checkdate($data['month'], $data['day'], $data['year'])) {
              $errors['error_birthdate'] = "Veuillez entrer une date valide";
            }
          } else {
            $errors['error_birthdate'] = "Veuillez renseigner votre date de naissance";
          }

          // Vérification
          if (!empty($data['password'])) {
            if ($data['password'] != $data['passwordConfirm']) {
              $errors['error_passwordConfirm'] = "Les mots de passe ne correspondent pas";
            }
          } else {
            $errors['error_password'] = "Veuillez renseigner un mot de passe";
          }

          // Vérification du nom du médecin
          if (!empty($data['doctor'])) {
            if (!ctype_alpha($data['doctor'])) {
              $errors['error_doctor'] = ("Caractères invalides");
            }
          } else {
            $errors['error_doctor'] = ("Veuillez renseigner le nom de votre médecin");
          }

          // Vérification du numéro de sécurité sociale
          if (!empty($data['healthNumber'])) {
            $checkHealthNumber = $this->user->checkHealthNumber($data['healthNumber']);
            if ($checkHealthNumber) {
              $errors['error_healthNumber'] = "Ce numéro de sécurité sociale est déjà associé à un compte";
            }
          } else {
            $errors['error_healthNumber'] = "Veuillez renseigner votre numéro de sécurité sociale";
          }

          if(empty($errors)) {
            $registrationdate = Model::getDate();
            $password_hash = password_hash($data['password'], PASSWORD_BCRYPT);
            $this->user->addNewUser($status, $data['firstName'], $data['lastName'], $data['mail'], $password_hash, $data['birthdate'], $data['doctor'], $data['healthNumber'], $registrationdate);
            $data= ['confirm' => "Utilisateur ajouté"];
            $this->generateView($data,'index');
          } else {
            $data = [$data, $errors];
            $this->generateView($data,'index');
          }

        }
      }
  }


}
