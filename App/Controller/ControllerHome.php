<?php


namespace App;


use APP\Controller;

require_once 'src/Controller.php';
require_once 'Model/Billet.php';
class ControllerHome extends Controller
{

    private $billet;

    public function __construct()
    {
    }

    // Affiche la liste de tous les billets du blog
    public function index()
    {
        $this->generateView();
    }
}