<?php

namespace App\Controller;
use src\Controller;
use src\Session;
use App\Model\User;
use App\Model\Test;

class DashboardController extends Controller {

  private User $user;
  private Test $test;

  public function __construct() {
        $this->user = new User();
        $this->test = new Test();
  }

  public function index()  {
    $healthNumber = $this->user->getHealthNumber($_SESSION['ID_User']);
    $test = $this->test->getUserTests($healthNumber);
    $this->generateView(array('User_test' => $test),"index");

    //switch (Session::getInstance()->getAttribute('sessionStatus')){
        //case 0:
            //header( "Location: /homepage");
            //break;
        //default:
            //$this->generateView(array(),'index');
            //break;
    }



      //Session::getInstance()->setAttribute('sessionStatus', $sessionStatus);
//        public function fn(
//        switch (Session::getInstance()->getAttribute('sessionStatus')){
//            case 0:
//                header( "Location: /homepage");
//                break;
//            case 1:
//                $this->generateView(array(),'index');
//                break;
//            case 2:
//                $this->generateView(array(),'index');
//                break;
//            case 3:
//                $this->generateView(array(),'index');
//                break;
//        }



}
