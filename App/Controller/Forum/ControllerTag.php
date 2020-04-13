<?php

namespace App;


use APP\Controller;
use App\Model\Forum\Tag;

class ControllerTag extends Controller
{

    private $tag;

    /**
     * Constructeur
     */
    public function __construct() {
        $this->tag = new Tag();
    }

    // Affiche les détails sur un billet
    public function index() {
        $idTag = $this->request->getParameter("id");
        $tag = $this->tag->getTag($idTag);
        $this->generateView(array('tag' => $tag));
    }
}