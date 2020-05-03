<?php

namespace App\Controller\Forum;


use src\Controller;

class TestController extends Controller
{
    public function index(){
        echo "hello je suis le test";
    }
    public function article($slug,$id){
        echo "Je suis l'article $slug, numéro $id";


    }

}