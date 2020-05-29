<?php


namespace App\Controller;
use src\Controller;


class AidesController extends Controller
{
    public function index()
    {

        $this->generateView(array(),'index');
    }

}