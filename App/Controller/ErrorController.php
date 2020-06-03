<?php

namespace App\Controller;
use src\Controller;
use src\Session;

class ErrorController extends Controller {

    public function index() {
        $this->generateView(array(),'index');
    }

    public function forbiddenAccess()
    {
        $this->generateView(array(),'forbiddenAccess');
    }

    public function generateError(int $id){
        switch ($id){
            case 404:
                $this->generateView(array(),'error404');
                break;
            case 502:

        }

    }

    // public function forbiddenAccess()
    // {
    //     $this->generateView(array(),'forbiddenAccess');
    // }
    //
    // public function generateError(int $id){
    //     switch ($id){
    //         case 404:
    //             $this->generateView(array(),'error404');
    //             break;
    //         case 502:
    //
    //     }
    //
    // }




}
