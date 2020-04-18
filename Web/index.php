<?php

//use Autoloader\Autoloader;
//require_once "../src/Autoloader.php";
//Autoloader::register('autoload2');
require '../src/Router/Router.php';
require '../src/Router/Route.php';
require '../src/Router/RouterException.php';
$router= new Router($_GET['url']);
//$router->get('/',function(){require '/View/Home/home.php';} ); // appel des controllers correspondants
//$router->get('/Homepage',function(){require '/View/Home/home.php';} ); // appel des controllers correspondants
//$router->get('/Our-Work',function(){echo 'our work';});
//$router->get('/FAQ',function(){echo 'FAQ';});
//$router->get('/posts',function(){echo 'tous les articles';});
$router->get('/article/:slug-:id',"Test#article#slug#id");
$router->get('/home',"Tag#index");
$router->get('/',"Test#index");


//$router->get('/posts/:slug-:id',function ($slug,$id){
//    echo "Article $slug : $id";
//})->with("id",'[0-9]+')->with('slug','0[a-z\0-9]+');
//
//$router->post('/posts/:id',function($id){echo 'Poster l\'article'.$id;});
$router->run();

