<?php

namespace App\Controller;
use src\Controller;
use Web\PHPMailer;
require 'Web/PHPMailer/PHPMailerAutoload.php';

class ContactController extends Controller {

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
          } else {
            $errors['error_subject'] = "Veuillez choisir un sujet";
          }

          if (!empty($data['message'])) {
          } else {
            $errors['error_message'] = "Veuillez saisir un message";
          }

          if (empty($errors)) {

            $mail = new PHPMailer();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='techcare.infinitemeasures@gmail.com';
            $mail->Password='[APP-G9D]';
            $mail->setFrom($data['mail'], $data['lastName']);
            $mail->addAdress('techcare.infinitemeasures@gmail.com');
            $mail->addReplyTo($data['mail'], $data['lastName']);
            $mail->isHTML(true);
            $mail->Subject=$data['subject'];
            $mail->Body=$data['message'];

          $this->generateView(array(),'index');
          } else {
            $data = [$data, $errors];
            $this->generateView($data,'index');
          }

        }
      }
    }

}
