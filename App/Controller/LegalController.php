<?php


namespace App\Controller;
use src\Controller;


class LegalController extends Controller {

    public function index()
    {
        $this -> generateView(array(),'index');
    }
}
