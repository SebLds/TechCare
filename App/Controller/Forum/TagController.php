<?php

namespace App\Controller\Forum;
use src\Controller;
use App\Model\Forum\Tag;

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
        $tags = $this->tag->getTags();
//        var_dump($tags);
//        var_dump($tags[0]->Creation_Date);
        var_dump(extract($tags));
        $this->generateView(array('tag' => $tags),"index");
    }
}