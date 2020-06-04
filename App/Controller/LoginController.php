<?php

namespace App\Controller;
use App\Model\NbConnexions;
use src\Controller;
use src\Model;
use src\Session;
use App\Model\User;


class LoginController extends Controller {

    /**
     * @var User
     */
    private User $user;
    /**
     * @var NbConnexions
     */
//    private NbConnexions $nbConnexions;

    public function __construct() {
        $this->user = new User();
//        $this->nbConnexions = new NbConnexions();
  }

  public function index() {

    if ($_SESSION['sessionStatus'] != 0) {
      header("Location: /dashboard");
    } else {
      $this->generateView(array(),'index');
    }

  }

  public function logout() {

    if (isset($_POST['logout'])) {
      session_unset();
      header("Location: /homepage");
    }
  }

  public function login() {

    // Vérification que la variable $_POST contienne des informations
    if (!empty($_POST)) {
        $mail='';
        $password='';
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
//            $this->nbConnexions->addConnexion(Model::getDate());
            $ID = $this->user->getID($data['mail']);
            $Status = $this->user->getStatus($ID);
            Session::getInstance()->setAttribute('ID_User', $ID);
            Session::getInstance()->setAttribute('sessionStatus', $Status);
            if ($_SESSION['sessionStatus'] == 1 || $_SESSION['sessionStatus'] == 2) {
               header("Location: /dashboard");
            }
            if ($_SESSION['sessionStatus'] == 3) {
               header("Location: /admin/dashboard");
            }
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
