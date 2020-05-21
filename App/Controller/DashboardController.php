<?php

namespace App\Controller;
use src\Controller;
use src\Session;

class DashboardController extends Controller
{
    public function index()
    {
        public function fn(
        switch (Session::getInstance()->getAttribute('sessionStatus')){
            case 0:
                header( "Location: /homepage");
                break;
            case 1:
                $this->generateView(array(),'index');
                break;
            case 2:
                $this->generateView(array(),'index');
                break;
            case 3:
                $this->generateView(array(),'index');
                break;
        }
    }
}