<?php

namespace App\Controller;
use src\Controller;
use src\Session;

class DashboardController extends Controller
{
    public function index()
    {
        Session::getInstance()->setAttribute('lang',"es");
//        Session::getInstance()->setAttribute('lang','po');
        switch (Session::getInstance()->getAttribute('sessionStatus')){
            case 0:
                header( "Location: /homepage");
                break;
            default:
                $this->generateView(array(),'index');
                break;
        }
    }
}