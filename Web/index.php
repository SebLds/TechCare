<?php


use src\Router\Router;
use src\Session;

/**
 * /!\ POUR TOUS LES FICHIERS DEFINIR UN NAMESPACE CORRESPONDANT A SA PLACE DANS L'ARCHITECTURE /!\
 */
require_once "../src/Autoloader.php";

Autoloader::addNamespace('src\Router', '../src/Router/');
Autoloader::addNamespace('src', '../src/');
Autoloader::addNamespace('App\Controller','../App/Controller/');
Autoloader::addNamespace('App\Controller\Forum','../App/Controller/Forum/');
Autoloader::addNamespace('App\Model\Forum','../App/Model/Forum/');
Autoloader::addNamespace('App\Controller\Register', '../App/Controller/Register/');
Autoloader::addNamespace('App\Model','../App/Model/');
Autoloader::addNamespace('App\Controller\Login', '../App/Controller/Login/');

Autoloader::addNamespace('src\Config', '../src/Config/');
Autoloader::register();

$session = new Session();

/**
 * pour le callable il faut absolument mettre le sous-dossier s'il y en a un
 * ex: Pour le controller TestController dans le dossier Forum du dossier Controller le callable est Forum\Test
 */
if (!isset($_GET['url'])){
//    if ($_SESSION['logged']==true){
//        switch ($_SESSION['status']){
//            case $_SESSION['status']===1:
//                // action
//                break;
//                // etc pour chaque user
//        }
//    }
    $_GET['url']='homepage';
}
$router= new Router($_GET['url']);
//$router->get('/',function(){require '/View/Home/index.php';} ); // appel des controllers correspondants
//$router->get('/Homepage',function(){require '/View/Home/index.php';} ); // appel des controllers correspondants
$router->get('/Our-Work',function(){echo 'our work';});
//$router->get('/FAQ',function(){echo 'FAQ';});
//$router->get('/posts',function(){echo 'tous les articles';});
$router->get('/article/:slug-:id',"Forum\Test#article#slug#id");

$router->get('/home',"Forum\Tag#index");
$router->get('/inscription',"Register\Register#index");
$router->post('/inscription',"Register\Register#validate");
$router->get('/forum',"Forum\Forum#index");
$router->get('/cgu',"Cgu#index");

$router->get('/homepage',"Home#index");
$router->get('/homepage-:slug',"Home#index");

$router->get('/login',"Login\Login#index");
$router->get('/faq',"Faq#index");


//$router->post('/home',"Forum\Forum#index");


//$router->get('',"Test#index");


//$router->get('/posts/:slug-:id',function ($slug,$id){
//    echo "Article $slug : $id";
//})->with("id",'[0-9]+')->with('slug','0[a-z\0-9]+');
//
//$router->post('/posts/:id',function($id){echo 'Poster l\'article'.$id;});
$router->run();
