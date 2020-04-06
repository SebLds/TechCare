<?php

require 'src/Router/Router.php';
require 'src/Router/Route.php';
require 'src/Router/RouterException.php';
$router= new Router($_GET['url']);
$router->get('/',function(){echo 'homepage';});
$router->get('/posts',function(){echo 'tous les articles';});
$router->get('/posts/:id',function($id){echo 'Afficher l\'article'. $id;});
$router->get('/posts/:slug-:id',function ($slug,$id){
    echo "Article $slug : $id";
})->with("id",'[0-9]+')->with('slug,0[a-z\0-9]+');
$router->post('/posts/:id',function($id){echo 'Poster l\'article'.$id;});
$router->run();