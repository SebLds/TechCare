<?php

namespace App\Controller\Forum;
use App\Model\Forum\Reply;
use App\Model\Forum\Thread;
use src\Controller;
use App\Model\Forum\Tag;

class ForumController extends Controller
{

    private Tag $tag;
    private Reply $reply;
    private Thread $thread;

    /**
     * Constructor
     */
    public function __construct() {
        $this->tag = new Tag();
        $this->thread = new Thread();
        $this->reply = new Reply();
    }

    public function index() {
        $tags = $this->tag->getTags();
        for ($i=1;$i<=count($tags);$i++){
            $nbThreads[]= $this->tag->getNbThreadsTagById($i);
            $nbReplies[]= $this->tag->getNbRepliesTagById($i);
        }
        $this->generateView(array('tags_info'=>$tags,'nbThreads'=>$nbThreads,'nbReplies'=>$nbReplies),"index");

    }
    public function test(){

        $json = file_get_contents("../Web/js/jquery.i18n/languages/en.json");
        $parsed_json = json_decode($json);
        $parsed_json->{'test'};
    }


}