<?php

namespace App\Controller;
use src\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $this->generateView(array(),'index');
    }
}
