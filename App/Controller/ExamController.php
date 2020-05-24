<?php

namespace App\Controller;
use src\Controller;
use src\Model;
use src\Session;
use App\Model\User;
use App\Model\Test;

class ExamController extends Controller {

  public static $healthNumber;
  private $selectCategory;
  private $selectProfil;
  private User $user;
  private Test $test;

  public function __construct() {
        $this->user = new User();
        $this->test = new Test();
  }

  public function index() {
      $this->generateView(array(),'index');
  }

  public function setUpTest() {

    if (!empty($_POST)) {
      extract($_POST);

        $data = [
          'healthNumber' => htmlspecialchars(trim($healthNumber)),
          'select-category' => $_POST['test-category'],
        ];

        Session::getInstance()->setAttribute('Patient_HealthNumber', $data['healthNumber']);
        Session::getInstance()->setAttribute('Select-Category', $data['select-category']);

        $errors = [];

        if (!empty($data['healthNumber'])) {
          $checkHealthNumber = $this->user->checkHealthNumber($data['healthNumber']);
          if (!$checkHealthNumber) {
            $errors['error_healthNumber'] = "Ce numéro de sécurité sociale n'appartient à aucun utilisateur";
          }
        } else {
          $errors['error_healthNumber'] = "Veuillez renseigner le numéro de sécurité sociale du patient";
        }

        if (!empty($data['select-category'])) {
        } else {
          $errors['error_select'] = "Veuillez choisir un type de test";
        }

        if(empty($errors)) {
          $this->generateView($data,'OptionsTest');
        } else {
          $this->generateView($errors,'index');
        }

        }
      }

  public function confirmTest() {

      $data = [
        'select-profil' => $_POST['test-profil'],
      ];

      Session::getInstance()->setAttribute('Select-Profil', $data['select-profil']);

      $errors = [];

      if (!empty($_POST)) {
        extract($_POST);

        if (isset($_POST['submit-2'])) {

          if (!empty($data['select-profil'])) {
          } else {
            $errors['error_selectProfil'] = "Veuillez choisir un profil";
          }

          if(empty($errors)) {
            $passDate = Model::getDate();
            $score = rand(0, 100);
            $this->test->newTest($_SESSION['Patient_HealthNumber'], $_SESSION['Select-Category'], $_SESSION['Select-Profil'], $score, $passDate);
            Session::getInstance()->deleteAttribute('Select-Profil');
            Session::getInstance()->deleteAttribute('Select-Category');
            $this->generateView($data,'ConfirmTest');
          } else {
            $this->generateView(array(),'OptionsTest');
          }

        }
      }
    }

  public function launchTest() {
    $test = $this->test->getUserTests($_SESSION['Patient_HealthNumber']);
    $user = $this->user->getUserInfo($_SESSION['Patient_HealthNumber']);
    $this->generateView($user, 'Summarytest');
  }

  public function submitComment() {

    if (isset($_POST['comment'])) {

      $comment = htmlspecialchars($_POST['comment']);
      $error = [];

      if (!empty($comment)) {
        $this->test->addComment($comment, $_SESSION['Patient_HealthNumber']);
        Session::getInstance()->deleteAttribute('Patient_HealthNumber');
        header('Location: /dashboard');
      } else {
        $error['error_comment'] = "Veuillez saisir un commentaire";
        $test = $this->test->getTest($_SESSION['Patient_HealthNumber']);
        $this->generateView($error, 'Summarytest');
      }

    }
  }

}
