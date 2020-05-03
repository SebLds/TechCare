<?php


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