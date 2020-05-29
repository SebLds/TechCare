<?php

namespace App\Controller;
use src\Controller;

class ForgetPasswordController extends Controller {

  public function index() {
  	
  	if ($_SESSION['sessionStatus'] != 0) {
      header("Location: /dashboard");
    }
     $this->generateView(array(),'index');
  }
}
