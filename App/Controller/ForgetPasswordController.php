<?php

namespace App\Controller;
use src\Controller;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        $this->generateView(array(),'index');
    }
}
