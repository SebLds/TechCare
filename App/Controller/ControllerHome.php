<?php


namespace App;


use APP\Controller;

require_once 'src/Controller.php';
class ControllerHome extends Controller
{

    private $billet;

    public function __construct()
    {
    }

    public function index()
    {
        $this->generateView();
    }
}