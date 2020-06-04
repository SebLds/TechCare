<?php


namespace App\Controller;
use src\Controller;


class TestController extends Controller {
    public function index() {
        $this->generateView(array(),'index');
    }
}
