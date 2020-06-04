<?php

namespace App\Controller\Forum;
use App\Model\Forum\Reply;
use App\Model\Forum\Thread;
use App\Model\User;
use src\Controller;
use src\Model;
use App\Model\Forum\Tag;


class ForumController extends Controller
{
    private Tag $tag;
    private Reply $reply;
    private Thread $thread;
    private User $user;


    /**
     * Constructor
     */
    public function __construct() {
        $this->tag = new Tag();
        $this->thread = new Thread();
        $this->reply = new Reply();
        $this->user = new User();
    }

    /**
     * Index method that shows the list of tags with information.
     */
    public function index() {
        if ($_SESSION['sessionStatus'] == 0) {
      header("Location: /homepage");
    }
    $tags = $this->tag->getTags();
        $nbThreads=[];
        $nbReplies=[];
        if(!empty($tags)){
            for ($i=0;$i<count($tags);$i++){
                $nbThreads[]= $this->tag->getNbThreadsTagById($tags[$i]->ID_Tag);
                $nbReplies[]= $this->tag->getNbRepliesTagById($tags[$i]->ID_Tag);
            }
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
        $this->generateView(array('searchResult' => $searchResult,'id'=>$id), "searchResult");

    }

    public function showThreadById($idTag,$idThread){
        $tag=$this->tag->getTagById($idTag);
        $thread=$this->thread->getThread($idThread);
        $replies=$this->reply->getReply($idThread);
        $listprofil = [];
        for ($i=0; $i<count($replies); $i++) {
          $listprofil[] = $this->user->getProfil($replies[$i]->ID_User);
        }
        $this->generateView(array('tag_infos'=>$tag, 'thread_infos'=>$thread,'replies'=>$replies, 'profil'=>$listprofil),"thread");
    }

//    public function showReplyById($id){
//        $reply=$this->reply->getReply($id);
//        $this->generateView(array('listReplies'=>$listReplies,'id'=>$id),"reply");
//    }

    /**
     * Show the list of threads of the tag.
     * @param $id Tag's id
     */
    public function showTagById($id){
       $tag=$this->tag->getTagById($id);
       $countrepliesthread = [];
      $listThreads= $this->thread->getThreadsTagById($id);
       for ($i=0; $i<count($listThreads); $i++) {
         $countrepliesthread[] = $this->reply->getNbRepliesThreadById($listThreads[$i]->ID_Thread);
       }
       
       $listThreads= $this->thread->getThreadsTagById($id);
		$this->generateView(array('nbreplies'=>$countrepliesthread, 'listThreads'=>$listThreads,'id'=>$id, 'tag_infos'=>$tag),"listThreadsTag");
    }

    public function formAddTag(){
        $this->generateView(array(),'addTag');
    }
    public function formAddThread(){
        if(isset($_POST['tagId'])){
            $tagTitle= $this->tag->getTagById($_POST['tagId'])->Tag_Title;
        }
        $this->generateView(array('tagTitle'=> $tagTitle),'addThread');
    }
    public function addThread(){
        if (!empty($_POST)) {
            $newThread='';
            $reply='';
            extract($_POST);
            if (isset($_POST['add'])) {
                $data = [
                    'newThread' => (string) htmlspecialchars($newThread),
                    'reply' => (string) htmlspecialchars($reply),
                ];
                if (!empty($data['newThread']) && !empty($data['reply'])) {
                    $creationDate = Model::getDate();
                    $idTag=$this->tag->getTagByTitle($_POST['tagTitle'])->ID_Tag;
                    $this->thread->addThread($data['newThread'], $creationDate);
                    $idThread=$this->thread->getThreadByTitle($data['newThread'])->ID_Thread;
                    $this->thread->addThreadIntoPost($idThread,$idTag);
                    $this->reply->addReply($_SESSION['ID_User'],$creationDate,$data['reply'],$idThread);
                    header("Location: /forum");
                } else {
                    if(isset($_POST['tagTitle'])){
                        $tagTitle= $_POST['tagTitle'];
                    }
                    $this->generateView(array('error' => "Veuillez ajouter un sujet avec le premier message",'tagTitle'=>$tagTitle),'addThread');
                }
            }
        }
    }
    public function addTag() {

        if (!empty($_POST)) {
            $newTag='';
            $description='';
        extract($_POST);

          if (isset($_POST['add'])) {

          $data = [
            'newTag' => (string) htmlspecialchars($newTag),
            'description' => (string) htmlspecialchars($description),
          ];

          if (!empty($data['newTag']) && !empty($data['description'])) {
            $creationDate = Model::getDate();
            $this->tag->addTag($data['newTag'], $data['description'], $creationDate);
            header("Location: /forum");
          } else {
            $this->generateView(array('error' => "Veuillez ajouter une catégorie avec sa description"),'addTag');
          }
        }
      }
    }

    public function deleteThread() {

      if (!empty($_POST)) {
          $threadName='';
        extract($_POST);

        if (isset($_POST['delete-thread'])) {
          $this->thread->deleteThread($threadName);
          $this->executeAction('index');
        }
      }
    }

    public function deleteTag() {
      if (!empty($_POST)) {
          $tagName='';
        extract($_POST);

        if (isset($_POST['delete'])) {
          $this->tag->deleteTag($tagName);
          $this->executeAction('index');
        }
      }
    }

    public function addReply() {
      if (!empty($_POST)) {
          $answer='';
          $reply='';
          $idTag='';
          $idThread='';
        extract($_POST);
        if (isset($answer)) {
          $reply = htmlspecialchars($reply);
          $errors = [];
          if (!empty($answer)) {
            $creationDate = Model::getDate();
            $this->reply->addReply($_SESSION['ID_User'], $creationDate, $reply,$idThread);
            header("Location: /forum/tag-$idTag/thread-$idThread");
          }
        }
      }
    }

}
