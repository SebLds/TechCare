<?php


namespace App\Controller;
use src\Controller;


class CguController extends Controller {
    // public function index() {
    //     $this->generateView(array(),'index');
    // }

    public function index() {
    	if ($_SESSION['sessionStatus'] != 0) {
        header("Location: /dashboard");
      }
       $this->generateView(array(),'index');
    }
}
