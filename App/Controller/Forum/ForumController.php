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

    /**
     * Index method that shows the list of tags with information.
     */
    public function index(){
        $tags = $this->tag->getTags();
        for ($i=1;$i<=count($tags);$i++){
            $nbThreads[]= $this->tag->getNbThreadsTagById($i);
            $nbReplies[]= $this->tag->getNbRepliesTagById($i);
        }

        $this->generateView(array('tags_info'=>$tags,'nbThreads'=>$nbThreads,'nbReplies'=>$nbReplies),"index");

    }

    /**
     * Research in the database either in all the threads or in all the threads for one tag.
     * @param null $id Tag's id
     */
    public function searchResult($id=null){
        if($id===null) {
            $searchResult = [];
            for ($i = 0; $i < count($this->thread->research('thread', 'Thread_Title', htmlspecialchars($_POST['research']),false)); $i++) {
                $searchResult[] = $this->thread->research('thread', 'Thread_Title', htmlspecialchars($_POST['research']),false)[$i];
            }
        }
        else{
            $searchResult = [];
            for ($i = 0; $i < count($this->thread->research('thread', 'Thread_Title', htmlspecialchars($_POST['research']),true,$id)); $i++) {
                $searchResult[] = $this->thread->research('thread', 'Thread_Title', htmlspecialchars($_POST['research']),true,$id)[$i];
            }
        }
        $this->generateView(array('searchResult' => $searchResult), "searchResult");

    }
    public function showThreadById($id){
        $thread=$this->thread->getThread($id);

        $this->generateView(array('listThreads'=>$listThreads,'id'=>$id),"thread");

    }

    /**
     * Show the list of threads of the tag.
     * @param $id Tag's id
     */
    public function showTagById($id){
       $listThreads= $this->tag->getThreadsTagById($id);
       $this->generateView(array('listThreads'=>$listThreads,'id'=>$id),"listThreadsTag");

    }

    public function test(){
        $this->generateView(array(),'test');

    }


}
