<?php

namespace App\Controller;
use src\Controller;
use src\Model;
use src\Session;
use App\Model\User;
use App\Model\Test;
use App\Model\TypeTest;
use App\Model\Module;

class ExamController extends Controller {

  public static $healthNumber;
  private $selectCategory;
  private $selectProfil;
  private User $user;
  private Test $test;
  private TypeTest $typetest;
  private Module $module;

  public function __construct() {
        $this->user = new User();
        $this->test = new Test();
        $this->typetest = new TypeTest();
        $this->module = new Module();
  }

  public function index() {
    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus'] ==1) {
      header("Location: /dashboard");
    }
    $typetest = $this->typetest->getTypeTest();
    $this->generateView(array('typetest'=>$typetest), 'index');
  }

  public function setUpTest() {

    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus'] ==1) {
      header("Location: /dashboard");
    }

    if (!empty($_POST)) {
      extract($_POST);

        $data = [
          'healthNumber' => htmlspecialchars(trim($healthNumber)),
          'select-test' => $_POST['select-test'],
          'select-profil' => $_POST['test-profil'],
        ];

        Session::getInstance()->setAttribute('Patient_HealthNumber', $data['healthNumber']);
        Session::getInstance()->setAttribute('Select-test', $data['select-test']);
        Session::getInstance()->setAttribute('Select-Profil', $data['select-profil']);

        $errors = [];

        if (!empty($data['healthNumber'])) {
          $checkHealthNumber = $this->user->checkHealthNumber($data['healthNumber']);
          if (!$checkHealthNumber) {
            $errors['error_healthNumber'] = "Ce numéro de sécurité sociale n'appartient à aucun utilisateur";
          }
        } else {
          $errors['error_healthNumber'] = "Veuillez renseigner le numéro de sécurité sociale du patient";
        }

        if (!empty($data['select-test'])) {
        } else {
          $errors['error_select'] = "Veuillez choisir un type de test";
        }

        if (!empty($data['select-profil'])) {
        } else {
          $errors['error_selectProfil'] = "Veuillez choisir un profil";
        }

        if(empty($errors)) {
          $module = $this->module->getModuleForTest($data['select-test']);
          $this->generateView(array('module' => $module, 'typetest'=>$data['select-test']),'OptionsTest');
        } else {
          $this->generateView($errors,'index');
        }

        }
      }

  public function confirmTest() {

    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus'] ==1) {
      header("Location: /dashboard");
    }

      $errors = [];

      if (!empty($_POST)) {
        extract($_POST);

        if (isset($_POST['submit-2'])) {

          if(empty($errors)) {
            $passDate = Model::getDate();
            $score = rand(0, 100);
            $doctor = $this->user->getDoctor($_SESSION['ID_User']);
            $doctor = $doctor->lastName . ' ' . $doctor->firstName;
            $this->test->newTest($_SESSION['Patient_HealthNumber'], $doctor, $_SESSION['Select-test'], $_SESSION['Select-Profil'], $score, $passDate);
            Session::getInstance()->setAttribute('ID_Test',$this->test->getTestByDate($passDate)->ID_Test);
            Session::getInstance()->deleteAttribute('Select-Profil');
            Session::getInstance()->deleteAttribute('Select-test');
            $user = $this->user->getUserInfo($_SESSION['Patient_HealthNumber']);
            $this->generateView($user,'ConfirmTest');
          } else {
            $this->generateView($errors,'OptionsTest');
          }

        }
      }
    }

  public function launchTest() {

    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus'] ==1) {
      header("Location: /dashboard");
    }
    $test = $this->test->getRecentTest($_SESSION['Patient_HealthNumber']);
    $user = $this->user->getUserInfo($_SESSION['Patient_HealthNumber']);
    $data = [$test, $user];
    $this->generateView($data, 'Summarytest');
  }

  public function submitComment() {

    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus'] ==1) {
      header("Location: /dashboard");
    }

    if (isset($_POST['comment'])) {

      $comment = htmlspecialchars($_POST['comment']);
      $error = [];

      if (!empty($comment)) {

        $this->test->addComment($comment,Session::getInstance()->getAttribute('ID_Test'));
        Session::getInstance()->deleteAttribute('ID_Test');
        Session::getInstance()->deleteAttribute('Patient_HealthNumber');
        if ($_SESSION['sessionStatus'] == 3) {
          header('Location: /admin/dashboard');
        } else {
          header('Location: /dashboard');
        }
      } else {
        $error['error_comment'] = "Veuillez saisir un commentaire";
        $user = $this->user->getUserInfo($_SESSION['Patient_HealthNumber']);
        $data = [$user, $error];
        $this->generateView($data, 'Summarytest');
      }

    }
  }

}
