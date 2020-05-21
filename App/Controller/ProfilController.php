<?php

namespace App\Controller;
use src\Controller;
use App\Model\User;

class ProfilController extends Controller {

  public function __construct() {
        $this->user = new User();
  }

  public function index() {
    $this->generateView(array(),'index');
  }

  public function showProfil() {
    $mail = 'maxime.schuchmann@isep.fr';
    $data = $this->getProfil($mail);
    var_dump($data);
  }

  public function changeProfil() {

    if (!empty($_POST)) {
      extract($_POST);

      if (isset($_POST['change'])) {



      }
    }

  }

}
