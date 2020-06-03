<?php

namespace App\Controller;
use App\Model\Forum\Reply;
use App\Model\Forum\Tag;
use App\Model\Forum\Thread;
use DateInterval;
use DateTime;
use src\Controller;
use src\Model;
use src\Session;
use App\Model\User;
use App\Model\Test;
use App\Model\FAQ;

class AdminController extends Controller {

    private User $user;
    private Test $test;
    private FAQ $faq;

    public function __construct() {
        $this->user = new User();
        $this->test = new Test();
        $this->faq = new Faq();
    }


  public function index() {
    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus']>0 && $_SESSION['sessionStatus']<2) {
      header("Location: /dashboard");
    }
    $this->generateView(array(), 'index');
  }
  public function searchUser(){
      if ($_SESSION['sessionStatus'] == 3) {
          if (isset($_POST['search'])) {
              $result = $this->user->findUserByLastName(null, htmlspecialchars($_POST['search']));
              $this->generateView(array('searchResult'=> $result), 'searchResult');
          } else {
              $this->executeAction('index');
          }
      }
  }

  public function showProfil($id){
        $profil=$this->user->getProfil($id);
        $this->generateView(array('profil'=> $profil), 'profilUser');
  }

  public function addUserIndex() {
    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus']>0 && $_SESSION['sessionStatus']<2) {
      header("Location: /dashboard");
    }
    $this->generateView(array(), 'AddUser');
  }

  public function addUser() {

    if (!empty($_POST)) {
      extract($_POST);

      if(isset($_POST['add'])) {

        $data = [
          'select-user-type' => $_POST['select-user-type'],
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
          'company' => (string) htmlspecialchars(trim($company)),
          'healthNumber' => htmlspecialchars(trim($healthNumber)),
          'birthdate' => $day .'/'. $month .'/'. $year,
        ];

        $errors = [];

        if (!empty($data['select-user-type'])) {
          if ($data['select-user-type'] == 'patient') {
            $status = 1;
          }
          if ($data['select-user-type'] == 'manager') {
            $status = 2;
          }
          if ($data['select-user-type'] == 'admin') {
            $status = 3;
          }
        } else {
          $errors['error_selectUserType'] = "Veuillez choisir un type d'utilisateur";
        }

        // Vérification du prénom
        if (!empty($data['firstName'])) {
          if (!ctype_alpha($data['firstName'])) {
            $errors['error_firstName'] = "Caractères invalides";
          }
        } else {
          $errors['error_firstName'] = "Veuillez renseigner un prénom";
        }

        // Vérification du nom
        if (!empty($data['lastName'])) {
          if (!ctype_alpha($data['lastName'])) {
            $errors['error_lastName'] = "Caractères invalides";
          }
        } else {
          $errors['error_lastName'] = "Veuillez renseigner un nom";
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
          $errors['error_mail'] = "Veuillez renseigner un mail";
        }

        // Vérification de la date de naissance
        if (!empty($data['day']) || !empty($data['month']) || !empty($data['year'])) {
          if (!checkdate($data['month'], $data['day'], $data['year'])) {
            $errors['error_birthdate'] = "Veuillez entrer une date valide";
          }
        } else {
          $errors['error_birthdate'] = "Veuillez renseigner une date de naissance";
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
        if ($data['select-user-type'] == 'patient') {
          if (!empty($data['doctor'])) {
            if (!ctype_alpha($data['doctor'])) {
              $errors['error_doctor'] = ("Caractères invalides");
            }
          } else {
            $errors['error_doctor'] = ("Veuillez renseigner le nom de votre médecin");
          }
        }

        // Vérification du nom du médecin
        if ($data['select-user-type'] == 'manager') {
          if (!empty($data['company'])) {
            if (!ctype_alpha($data['company'])) {
              $errors['error_company'] = ("Caractères invalides");
            }
          } else {
            $errors['error_company'] = ("Veuillez renseigner un nom d'entreprise");
          }
        }


        // Vérification du numéro de sécurité sociale
        if ($data['select-user-type'] == 'patient') {
          if (!empty($data['healthNumber'])) {
            $checkHealthNumber = $this->user->checkHealthNumber($data['healthNumber']);
            if ($checkHealthNumber) {
              $errors['error_healthNumber'] = "Ce numéro de sécurité sociale est déjà associé à un compte";
            }
          } else {
            $errors['error_healthNumber'] = "Veuillez renseigner votre numéro de sécurité sociale";
          }
        }

        if(empty($errors)) {
          $registrationdate = Model::getDate();
          $password_hash = password_hash($data['password'], PASSWORD_BCRYPT);
          $this->user->addNewUser($status, $data['firstName'], $data['lastName'], $data['mail'], $password_hash, $data['birthdate'], $data['doctor'], $data['company'], $data['healthNumber'], $registrationdate);
          $data= ['confirm' => "Utilisateur ajouté"];
          $this->generateView($data,'AddUser');
        } else {
          $data = [$data, $errors];
          $this->generateView($data,'AddUser');
        }

        }
      }
  }

  public function stats() {
    if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    if ($_SESSION['sessionStatus']>0 && $_SESSION['sessionStatus']<2) {
      header("Location: /dashboard");
    }
        $averageAgePatient=0;
        $ageListPatient =$this->user->getAgeListPatient();
      $size=count($ageListPatient);
      for($i=0;$i<$size;$i++){
          $averageAgePatient+=(int)$ageListPatient[$i];
        }
      $averageAgePatient=floor($averageAgePatient/$size);

      $nbUsers=(int) $this->user->getNbUsers();
      $nbTests=(int) $this->test->getNbTests();

      $averageScoreSound = round($this->averageScore('sound'));
      $averageScoreStress = round($this->averageScore('stress'));
      $averageScoreSight = round($this->averageScore('sight'));
      $nbUsersByStatus=[$this->user->getNbUsersByStatus(1),$this->user->getNbUsersByStatus(2),$this->user->getNbUsersByStatus(3)];
      $listDate=[];
      $minus=6;
      for ($i=0;$i<7;$i++){
          $currentDate = new DateTime(str_replace("/","-",Model::getDate()));
          $currentDate->sub(new DateInterval('P'.$minus.'D'));
          $tmpDate=substr($currentDate->format('d-m-Y'),0,5);
          $listDate[]=$tmpDate;
          $minus--;
      }
      $nbTestsWeek=[];
      for ($i=0;$i<7;$i++){
          if($i==0){
              $nbTestsWeek[]=(int)$this->test->getNbTestsByTime('P'.$i.'D');
          }else{
              $nbTestsWeek[]=$this->test->getNbTestsByTime('P'.$i.'D')-$this->test->getNbTestsByTime('P'.($i-1).'D');
          }
      }
      $data=['doughnut'=> $nbUsersByStatus,
             'bar'=> ['date'=>$listDate,
                      'nbTestsWeek'=>$nbTestsWeek],
             'avg'=>[$averageAgePatient,$averageScoreSound,$averageScoreStress,$averageScoreSight],
             'nb'=>[$nbUsers,$nbTests]];

      $this->generateView($data,'stats');
    }

    private function averageScore($type) {
        $averageScore=0;
        $listScore=$this->test->getListScoreTest($type);
        $size=count($listScore);
        for ($i=0;$i<$size;$i++){
            $averageScore+=$listScore[$i];
        }
        $averageScore=$averageScore/$size;
        return $averageScore;
    }

    public function editFAQIndex() {
      $FAQ = $this->faq->getFAQ();
      $this->generateView(array('faq' => $FAQ),'editFAQ');
    }

    public function editFAQ() {

      if (!empty($_POST)) {
        extract($_POST);

        if (isset($_POST['add'])) {

          $data = [
            'newQuestion' => (string) htmlspecialchars($newQuestion),
            'newAnswer' => htmlspecialchars($newAnswer),
          ];

          $error = [];

          if (!empty($data['newQuestion']) && !empty($data['newAnswer'])) {
            $this->faq->addQuestion($data['newQuestion'], $data['newAnswer']);
            $FAQ = $this->faq->getFAQ();
            $this->generateView(array('faq' => $FAQ),'editFAQ');
          } else {
            $FAQ = $this->faq->getFAQ();
            $this->generateView(array('faq' => $FAQ, 'error' => "Veuillez ajouter une question avec sa réponse"),'editFAQ');
          }
        }

          if (isset($_POST['delete'])) {

            $data = [
              'question' => (string) htmlspecialchars($question),
              'answer' => htmlspecialchars($answer),
            ];

            if (!empty($data['question']) && !empty($data['answer'])) {
              $this->faq->deleteQuestion($data['question'], $data['answer']);
              $FAQ = $this->faq->getFAQ();
              $this->generateView(array('faq' => $FAQ),'editFAQ');
            }
          }

          if (isset($_POST['modify'])) {

            $data = [
              'question' => (string) htmlspecialchars($_POST['question']),
              'answer' => htmlspecialchars($answer),
            ];

            if (!empty($data['question']) && !empty($data['answer'])) {

            $this->faq->modifyQuestion($data['question'], $data['answer']);
            $FAQ = $this->faq->getFAQ();
            $this->generateView(array('faq' => $FAQ),'editFAQ');
           }
         }

        }
      }

      public function editUserProfil() {

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
              $this->user->modifyProfil($data['newFirstName'], $data['newLastName'], $data['newMail'], $data['newDoctor'], $data['newHealthNumber'], );
              $data = $this->user->getProfil($_SESSION['ID_User']);
              $this->generateView($data,'index');
            } else {
              $data = [$data, $errors];
              $this->generateView($data,'index');
            }

          }

          if (isset($_POST['delete'])) {
            $ID = $this->user->getID($newMail);
            $this->user->deleteUser($ID);
            header("Location: /admin/dashboard");
          }

          if (isset($_POST['ban'])) {
            $ID = $this->user->getID($newMail);
            $profil = $this->user->getProfil($ID);
            $banDate = Model::getDate();
            $this->user->banUser($profil['status'], $profil['firstName'],$profil['lastName'], $profil['mail'], $profil['password'], $profil['birthdate'],$profil['doctor'], $profil['company'], $profil['healthNumber'], $profil['registrationdate'], $banDate);
            $this->user->deleteUser($ID);
            header("Location: /admin/dashboard");
          }

        }
      }
    }
