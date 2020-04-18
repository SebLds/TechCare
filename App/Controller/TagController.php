<?php

namespace App;



//use APP\Tag;
use APP\Controller;
use APP\Tag;
//echo $string=dirname(__DIR__, 2) . "\src\Controller.php";
//require "$string";

class TagController extends Controller
{

    private Tag $tag;

    /**
     * Constructor
     */
    public function __construct() {
        $this->tag = new Tag();
    }


    public function index() {
//        $idTag = $this->request->getParameter("id");
        $tag = $this->tag->getTags();
        $this->generateView(array('tag' => $tag));
    }
}