<?php

namespace App\Controller;
use src\Controller;


class ProfilController extends Controller {

  public function index()
  {
      $this->generateView(array(),'index');
  }

}
