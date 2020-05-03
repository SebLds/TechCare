<?php

namespace App\Controller;
use src\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->generateView(array(),'index');
    }
}
