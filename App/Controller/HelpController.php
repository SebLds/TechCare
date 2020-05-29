<?php


namespace App\Controller;
use src\Controller;


class HelpController extends Controller
{
    public function index()
    {

        $this->generateView(array(),'index');
    }

}