<?php


namespace App\Controller;
use src\Controller;


class CguController extends Controller {
    public function index() {
        $this->generateView(array(),'index');
    }
}
