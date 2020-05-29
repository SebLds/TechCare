<?php

namespace App\Controller;
use src\Controller;

class HomeController extends Controller {

    public function index() {

    if ($_SESSION['sessionStatus'] != 0) {
      header("Location: /dashboard");
    } else {
      $this->generateView(array(),'index');
    }
}

}
