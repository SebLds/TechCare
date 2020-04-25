<?php


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