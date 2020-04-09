<?php

//require 'src/Router/Router.php';
//require 'src/Router/Route.php';
//require 'src/Router/RouterException.php';
//require 'App/Model/Model.php';
//require 'Config/Config.php';
require 'autoloader.php';
Autoloader::register();
$router= new Router($_GET['url']);
$router->get('/Homepage',function(){echo 'homepage';} ); // appel des controllers correspondants
$router->get('/Our-Work',function(){echo 'our work';});
$router->get('/FAQ',function(){echo 'FAQ';});
$router->get('/posts',function(){echo 'tous les articles';});
$router->get('/posts/:id',function($id){echo 'Afficher l\'article'. $id;});
$router->get('/posts/:slug-:id',function ($slug,$id){
    echo "Article $slug : $id";
})->with("id",'[0-9]+')->with('slug','0[a-z\0-9]+');

$router->post('/posts/:id',function($id){echo 'Poster l\'article'.$id;});
$router->run();


