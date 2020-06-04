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

    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    $data = $this->user->getProfil($_SESSION['ID_User']);
    $this->generateView($data,'index');
  }

  public function change() {

    if (!empty($_POST)) {
        $newFirstName='';
        $newLastName='';
        $newMail='';
        $day=0;
        $month=0;
        $year=0;
        $newDoctor='';
        $newHealthNumber='';
        $newCompany='';
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
          'newCompany' => (string) htmlspecialchars(ucfirst(trim($newFirstName)))
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

        //Validation des modifications
        if (!empty($data['confirmChanges'])) {
        } else {
          $errors['error_confirmChanges'] = 'Veuillez saisir votre mot de passe pour valider les modifications';
        }

        if(empty($errors)) {
          $this->user->modifyProfil($_SESSION['sessionStatus'], $data['newFirstName'], $data['newLastName'], $data['newMail'], $data['newDoctor'], $data['newHealthNumber'], $data['newCompany'],$data["birthdate"], $_SESSION['ID_User']);
          $data = $this->user->getProfil($_SESSION['ID_User']);
          $this->generateView($data,'index');
        } else {
          $this->generateView(array(''),'index');
        }

      }
    }

  }

}
