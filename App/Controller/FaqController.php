<?php

namespace App\Controller;
use src\Controller;
use App\Model\FAQ;

class FaqController extends Controller {

  public function __construct() {
      $this->faq = new Faq();
  }

  public function index() {
      $FAQ = $this->faq->getFAQ();
      $this->generateView(array('faq' => $FAQ),'index');
  }

}
