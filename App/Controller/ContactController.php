<?php

namespace App\Controller;
use src\Controller;
use App\Model\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'src/PHPMailer/src/Exception.php';
require 'src/PHPMailer/src/PHPMailer.php';
require 'src/PHPMailer/src/SMTP.php';

class ContactController extends Controller {

  private User $user;

  public function __construct() {
        $this->user = new User();
  }

    public function index() {
      if ($_SESSION['sessionStatus'] != 0) {
      header("Location: /dashboard");
    } else {
      $this->generateView(array(),'index');
    }
  }

    public function contactAdminIndex() {
        $this->generateView(array(),'contactAdmin');
    }

    public function contactAdmin() {

      if(!empty($_POST)) {
        extract ($_POST);

        if (isset($_POST['send'])) {

          $data = [
            'subject' => $_POST['subject'],
            'message' => (string) htmlspecialchars($message),
          ];

          $errors = [];

          if (!empty($data['subject'])) {
            if ($data['subject']=='issue') {
              $subject='Probleme technique';
            }
            if ($data['subject']=='commercial') {
              $subject='Offre commerciale';
            }
            if ($data['subject']=='divers') {
              $subject='Divers';
            }
          } else {
            $errors['error_subject'] = "Veuillez choisir un sujet";
          }

          if (!empty($data['message'])) {
          } else {
            $errors['error_message'] = "Veuillez saisir un message";
          }

          if (empty($errors)) {

            $profil = $this->user->getProfil($_SESSION['ID_User']);

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ));
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='techcare.infinitemeasures@gmail.com';
            $mail->Password='[APP-G9D]';
            $mail->setFrom($profil['mail'], $profil['lastName']);
            $mail->addAddress('techcare.infinitemeasures@gmail.com');
            $mail->isHTML(true);
            $mail->Subject= $subject;
            $mail->Body= "Status :" . " " . $profil['status'] . " " .
                         "Prénom :" . " " . $profil['firstName'] . " " .
                         "Nom :" . " " . $profil['lastName'] . " " .
                         "Mail :" . " " . $profil['mail'] . " " .
                          $data['message'];
            $mail->send();

            $this->generateView(array('msg-validate' => 'Merci pour votre message, nous vous répondrons au plus vite'),'contactAdmin');
          } else {
            $data = [$data, $errors];
            $this->generateView($data,'contactAdmin');
          }
        }
      }
    }

    public function sendMail() {

      if(!empty($_POST)) {
        extract ($_POST);

        if (isset($_POST['send'])) {

          $data = [
            'firstName' => (string) htmlspecialchars(trim($firstName)),
            'lastName' => (string) htmlspecialchars(trim($lastName)),
            'mail' => (string) htmlspecialchars($mail),
            'company' => (string) htmlspecialchars($company),
            'subject' => $_POST['subject'],
            'message' => (string) htmlspecialchars($message),
          ];

          $errors = [];

          if (!empty($data['firstName'])) {
            if (!ctype_alpha($data['firstName'])) {
              $errors['error_firstName'] = "Caractères invalides";
            }
          } else {
            $errors['error_firstName'] = "Veuillez renseigner votre prénom";
          }

          if (!empty($data['lastName'])) {
            if (!ctype_alpha($data['lastName'])) {
              $errors['error_lastName'] = "Caractères invalides";
            }
          } else {
            $errors['error_lastName'] = "Veuillez renseigner votre nom";
          }

          if (!empty($data['mail'])) {
            if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
              $errors['error_mail'] = "L'adresse email est invalide";
            }
          } else {
            $errors['error_mail'] = "Veuillez renseigner votre mail";
          }

          if (!empty($data['company'])) {
            if (!ctype_alpha($data['company'])) {
              $errors['error_company'] = ("Caractères invalides");
            }
          } else {
            $errors['error_company'] = ("Veuillez renseigner le nom de votre entreprise/institution");
          }

          if (!empty($data['subject'])) {
            if ($data['subject']=='issue') {
              $subject='Probleme technique';
            }
            if ($data['subject']=='commercial') {
              $subject='Offre commerciale';
            }
            if ($data['subject']=='divers') {
              $subject='Divers';
            }
          } else {
            $errors['error_subject'] = "Veuillez choisir un sujet";
          }

          if (!empty($data['message'])) {
          } else {
            $errors['error_message'] = "Veuillez saisir un message";
          }

          if (empty($errors)) {

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ));
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='techcare.infinitemeasures@gmail.com';
            $mail->Password='[APP-G9D]';
            $mail->setFrom($data['mail'], $data['lastName']);
            $mail->addAddress('techcare.infinitemeasures@gmail.com');
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body= "Prénom :" . " " . $data['firstName'] . " " .
            "Nom :" . " " . $data['lastName'] . " " .
            "Mail :" . " " . $data['mail'] . " " .
            "Message :" . " " . $data['message'];
            $mail->send();

            $this->generateView(array('msg-validate' => 'Merci pour votre message, nous vous répondrons au plus vite'),'index');
          } else {
            $data = [$data, $errors];
            $this->generateView($data,'index');
          }

        }
      }
    }

}
