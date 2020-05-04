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
//        $idTag = $this->request->getParameter("id");
        $tags = $this->tag->getTags();
        for ($i=1;$i<=count($tags);$i++){
            $nbThreads[]= $this->tag->getNbThreadsTagById($i);
            $nbReplies[]= $this->tag->getNbRepliesTagById($i);
        }


//

//        extract($arrayTitles);
//        var_dump($arrayTitles[0]);
//        var_dump($tags[0]->Creation_Date);
// extract($tags);
//       echo '<article>
//                <header>
//                    <h1 class="titreBillet">'.$tags[0]->Tag_Title.'</h1>
//                    <time>'.$tags[0]->Creation_Date.'</time>
//                </header>
//                <p>'.$tags[0]->ID_Tag.'</p>
//            </article>';
//        var_dump(extract($tags));
        $this->generateView(array('tags_info'=>$tags,'nbThreads'=>$nbThreads,'nbReplies'=>$nbReplies),"index");
    }

}