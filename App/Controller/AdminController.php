<?php

namespace App\Controller;
use App\Model\Forum\Reply;
use App\Model\Forum\Tag;
use App\Model\Forum\Thread;
use App\Model\NbConnexions;
use DateInterval;
use DateTime;
use src\Controller;
use src\Model;
use src\Session;
use App\Model\User;
use App\Model\Test;
use App\Model\FAQ;
use App\Model\TypeTest;
use App\Model\Module;

class AdminController extends Controller {

    private User $user;
    private Test $test;
    private FAQ $faq;
    private TypeTest $typetest;
    private Module $module;
    private NbConnexions $nbConnexions;

    public function __construct() {
        $this->user = new User();
        $this->test = new Test();
        $this->faq = new Faq();
        $this->typetest = new TypeTest();
        $this->module = new Module();
        $this->nbConnexions = new NbConnexions();
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

  public function formAddUser(){
      $this->generateView(array(),'AddUser');
  }

  public function addUser() {

    if (!empty($_POST)) {
        $firstName='';
        $lastName='';
        $mail='';
        $mailConfirm='';
        $password='';
        $passwordConfirm='';
        $day=0;
        $month=0;
        $year=0;
        $doctor='';
        $company='';
        $healthNumber='';
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
          'healthNumber' => (int) htmlspecialchars(trim($healthNumber)),
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

        // Vérification du mot de passe
        if (!empty($data['password'])) {
          if (strlen($data['password']) > 6) {
            if ($data['password'] != $data['passwordConfirm']) {
              $errors['error_passwordConfirm'] = "Les mots de passe ne correspondent pas";
            }
          } else {
            $errors['error_password'] = "Minimum 6 caractères et 1 chiffre";
          }
        } else {
          $errors['error_password'] = "Veuillez renseigner un mot de passe";
        }

        // Vérification du nom du médecin
        if ($data['select-user-type'] == 'patient') {
          if (!empty($data['doctor'])) {
            if (!ctype_alpha($data['doctor'])) {
              $errors['error_doctor'] = "Caractères invalides";
            }
          } else {
            $errors['error_doctor'] = "Veuillez renseigner le nom de votre médecin";
          }
        }

        // Vérification du nom de société
        if ($data['select-user-type'] == 'manager' || $data['select-user-type'] == 'admin') {
          if (empty($data['company'])) {
            $errors['error_company'] = "Veuillez renseigner un nom d'entreprise";
          }
        }

        // Vérification du numéro de sécurité sociale
        if ($data['select-user-type'] == 'patient') {
          if (!empty($data['healthNumber'])) {
            if ($data['healthNumber'] == 15) {
              $checkHealthNumber = $this->user->checkHealthNumber($data['healthNumber']);
              if ($checkHealthNumber) {
                $errors['error_healthNumber'] = "Ce numéro de sécurité sociale est déjà associé à un compte";
              }
            } else {
              $errors['error_healthNumber'] = "Un numéro de sécurité sociale possède 15 chiffres";
            }
          } else {
            $errors['error_healthNumber'] = "Veuillez renseigner votre numéro de sécurité sociale";
          }
        }

        if(empty($errors)) {
          $registrationdate = Model::getDate();
          $password_hash = password_hash($data['password'], PASSWORD_BCRYPT);
          $this->user->addNewUser($status, $data['firstName'], $data['lastName'], $data['mail'], $password_hash, $data['birthdate'], $data['doctor'], $data['company'], $data['healthNumber'], $registrationdate);
          $this->generateView($data,'index');
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
      if($size>0){
          $averageAgePatient=floor($averageAgePatient/$size);
      }

      $nbUsers=(int) $this->user->getNbUsers();
      $nbTests=(int) $this->test->getNbTests();

      $averageScoreSound = round($this->averageScore('Acuité sonore'));
      $averageScoreStress = round($this->averageScore('Gestion du stress'));
      $averageScoreSight = round($this->averageScore('Acuité visuelle'));
      $nbUsersByStatus=[$this->user->getNbUsersByStatus(1),$this->user->getNbUsersByStatus(2),$this->user->getNbUsersByStatus(3)];
      $listDate=[];
      $minus=7;
      for ($i=0;$i<7;$i++){
          $currentDate = new DateTime(str_replace("/","-",Model::getDate()));
          $currentDate->sub(new DateInterval('P'.$minus.'D'));
          $tmpDate=substr($currentDate->format('d-m-Y'),0,5);
          $listDate[]=$tmpDate;
          $minus--;
      }
//      $nbTestsWeek=[];
//      for ($i=1;$i<8;$i++){
//          $nbTestsWeek[]=$this->test->getNbTestsByTime('P'.$i.'D')-$this->test->getNbTestsByTime('P'.($i-1).'D');
//      }
//      $nbConnexionsWeek=[];
//      for ($i=1;$i<8;$i++){
//          var_dump($this->nbConnexions->getNbConnexionsByTime('P0D'));
//          var_dump($this->nbConnexions->getNbConnexionsByTime('P'.($i-1).'D'));
//          var_dump('une itération');
//          $nbConnexionsWeek[]=$this->nbConnexions->getNbConnexionsByTime('P'.$i.'D')-$this->nbConnexions->getNbConnexionsByTime('P'.($i-1).'D');
//      }
//      var_dump($nbConnexionsWeek);
//      ,
//      'nbTestsWeek'=>$nbTestsWeek,
//                      'nbConnexionsWeek'=>$nbConnexionsWeek
      $data=['doughnut'=> $nbUsersByStatus,
             'bar'=> ['date'=>$listDate],
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
        if($size>0){
            $averageScore=$averageScore/$size;
        }
        return $averageScore;
    }

    public function editFAQIndex() {
      $FAQ = $this->faq->getFAQ();
      $this->generateView(array('faq' => $FAQ),'editFAQ');
    }

    public function editFAQ() {

      if (!empty($_POST)) {
          $question='';
          $answer='';
          $newAnswer='';
          $newQuestion='';
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
              $ID = $this->user->getID($newMail);
              $status = $this->user->getStatus($ID);
              $this->user->modifyProfil($status, $data['newFirstName'], $data['newLastName'], $data['newMail'], $data['newDoctor'], $data['newHealthNumber'], $data['newCompany'],$data["birthdate"], $ID);
              $data = $this->user->getProfil($_SESSION['ID_User']);
              header("Location: /admin/dashboard");
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

      public function formAddTest() {
        $module = $this->module->getModule();
        $this->generateView(array('module'=>$module), 'addTest');
      }

      public function formAddModule() {
        $typetest = $this->typetest->getTypeTest();
        $this->generateView(array('typetest'=>$typetest), 'addModule');
      }

      public function formDeleteTest() {
        $typetest = $this->typetest->getTypeTest();
        $this->generateView(array('typetest'=>$typetest), 'deleteTest');
      }

      public function formDeleteModule() {
        $module = $this->module->getModule();
        $this->generateView(array('module'=>$module), 'deleteModule');
      }

      public function formAssociate() {
        $module = $this->module->getModule();
        $typetest = $this->typetest->getTypeTest();
        $this->generateView(array('module'=>$module, 'typetest'=>$typetest), 'associate');
      }

      public function addTest() {

        if (!empty($_POST)) {
          extract($_POST);

          if(isset($_POST['add-test'])) {

            $data = [
              'newTest' => htmlspecialchars(trim($newTest)),
            ];

            $errors = [];

            if (empty($data['newTest'])) {
              $errors['error_test'] = "Veuillez renseigner le nom du test";
            }

            if(empty($errors)) {
              $this->typetest->addTypeTest($data['newTest']);
              $this->generateView(array('msg' => 'Test Ajouté'),'index');
            } else {
              $this->generateView($errors,'AddTest');
            }

            }
          }
      }

      public function addModule() {

        if (!empty($_POST)) {
          extract($_POST);

          if(isset($_POST['add-module'])) {

            $data = [
              'newModule' => htmlspecialchars(trim($newModule)),
              'settingssportsman' => htmlspecialchars(trim($settingssportsman)),
              'settingssedentary' => htmlspecialchars(trim($settingssedentary)),
              'settingsactif' => htmlspecialchars(trim($settingsactif)),
            ];

            $errors = [];

            if (empty($data['newModule'])) {
              $errors['error_module'] = "Veuillez renseigner le nom du module";
            }

            if (empty($data['settingssportsman']) && empty($data['settingssedentary']) && empty($data['settingsactif'])) {
              $errors['error_settings'] = "Veuillez renseigner les paramètres du module";
            }

            if (isset($data['select-test'])) {

            }

            if(empty($errors)) {
              $typetest=null;
              $this->module->addModule($data['newModule'], $typetest, $data['settingssportsman'], $data['settingssedentary'], $data['settingsactif']);
              $this->generateView(array('msg' => 'Module Ajouté'),'index');
            } else {
              $this->generateView($errors,'AddModule');
            }

            }
          }
      }

      public function deleteTest() {

        if (!empty($_POST)) {
          extract($_POST);

          if(isset($_POST['delete-test'])) {

            $data = [
              'select-test' => htmlspecialchars($_POST['select-test']),
            ];

            $errors = [];

            if (empty($data['select-test'])) {
              $errors['error_select'] = 'Veuillez choisir un test';
            }

            if(empty($errors)) {
              $this->typetest->deleteTypeTest($data['select-test']);
              $this->generateView(array('msg' => 'Test supprimé'),'index');
            } else {
              $this->generateView($errors,'DeleteTest');
            }

            }
          }
      }

      public function deleteModule() {

        if (!empty($_POST)) {
          extract($_POST);

          if(isset($_POST['delete-module'])) {

            $data = [
              'select-module' => htmlspecialchars($_POST['select-module']),
            ];

            $errors = [];

            if (empty($data['select-module'])) {
              $errors['error_select'] = 'Veuillez choisir un module';
            }

            if(empty($errors)) {
              $this->module->deleteModule($data['select-module']);
              $this->generateView(array('msg' => 'Module supprimé'),'index');
            } else {
              $this->generateView($errors,'DeleteModule');
            }

            }
          }
      }

      public function associate() {

        if (!empty($_POST)) {
          extract($_POST);

          if(isset($_POST['associate'])) {

            $data = [
              'select-module' => htmlspecialchars($_POST['select-module']),
              'select-test' => htmlspecialchars($_POST['select-test']),
            ];

            $errors = [];

            if (empty($data['select-module'])) {
              $errors['error_selectmodule'] = 'Veuillez choisir un module';
            }

            if (empty($data['select-test'])) {
              $errors['error_selecttest'] = 'Veuillez choisir un test';
            }

            if(empty($errors)) {
              $this->module->associate($data['select-module'], $data['select-test']);
              $this->generateView(array('msg' => 'Test et module associé'),'index');
            } else {
              $this->generateView($errors,'associate');
            }

            }
          }
      }

    }
