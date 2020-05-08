<?php

namespace App\Controller;
use src\Controller;

class LaunchTestController extends Controller
{
    public function index()
    {
        $this->generateView(array(),'index');
    }
}
