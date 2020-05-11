<?php

namespace App\Controller;
use src\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $this->generateView(array(),'index');
    }


}