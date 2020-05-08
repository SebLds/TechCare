<?php

namespace App\Controller;
use src\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->generateView(array(),'index');
    }
}