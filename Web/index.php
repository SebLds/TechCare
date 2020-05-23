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
Autoloader::addNamespace('App\Model','../App/Model/');

Autoloader::addNamespace('src\Config', '../src/Config/');
Autoloader::register();

//$session= new Session();
Session::getInstance();
//Session::getInstance()->setAttribute('isLogged',false);
//Session::getInstance()->setAttribute('sessionStatus',0);
//Session::getInstance()->setAttribute('lang','fr');

//$session = new Session();
//Session::setAttribute('lang','po');
var_dump($_SESSION);

/**
 * pour le callable il faut absolument mettre le sous-dossier s'il y en a un
 * ex: Pour le controller TestController dans le dossier Forum du dossier Controller le callable est Forum\Test
 */
if (!isset($_GET['url'])){
    $_GET['url']='homepage';
}
$router= new Router($_GET['url']);

$router->get('/Our-Work',function(){echo 'our work';});
$router->get('/article/:slug-:id',"Forum\Test#article#slug#id");
$router->get('/register',"Register#index");
$router->post('/register',"Register#register");
$router->get('/homepage',"Home#index");
$router->get('/homepage/:slug',"Home#index");
$router->get('/faq',"Faq#index");
$router->get('/cgu',"Cgu#index");
$router->get('/profil',"Profil#index");
$router->post('/profil',"Profil#change");
$router->post('/logout',"Login#logout");
$router->get('/testtamer',"Forum\Forum#test");
$router->get('/error-:id',"Error#generateError#id");
$router->get('/login',"Login#index");
$router->post('/login',"Login#login");
$router->get('/test',"Exam#index");
$router->post('/test-options',"Exam#setUpTest");
$router->post('/test-confirm',"Exam#confirmTest");
$router->get('/test-summary',"Exam#launchTest");
$router->post('/test-summary',"Exam#submitComment");
$router->get('/set-new-password',"ForgetPassword#index");
$router->get('/contact',"Contact#index");
$router->get('/dashboard',"Dashboard#index");

/** Forum */
$router->get('/forum',"Forum\Forum#index");
$router->post('/forum/result-threads',"Forum\Forum#searchResult");
$router->get('/forum/thread-:id',"Forum\Forum#showThreadById#id");
$router->get('/forum/tag-:id',"Forum\Forum#showTagById#id");
$router->post('/forum/result-threads-tag-:id',"Forum\Forum#searchResult#id");


$router->run();
