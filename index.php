<?php


use src\Config\Config;
use src\Router\Router;
use src\Session;

/**
 * /!\ POUR TOUS LES FICHIERS DEFINIR UN NAMESPACE CORRESPONDANT A SA PLACE DANS L'ARCHITECTURE /!\
 */
require_once "src/Autoloader.php";


Autoloader::addNamespace('src\Router', 'src/Router/');
Autoloader::addNamespace('src', 'src/');
Autoloader::addNamespace('App\Controller','App/Controller/');
Autoloader::addNamespace('App\Controller\Forum','App/Controller/Forum/');
Autoloader::addNamespace('App\Model\Forum','App/Model/Forum/');
Autoloader::addNamespace('App\Model','App/Model/');

Autoloader::addNamespace('src\Config', 'src/Config/');
Autoloader::register();

Session::getInstance();
if (!isset($_GET['url'])){
    $_GET['url']='homepage';
}

$router= new Router($_GET['url']);

/**Homepage**/
$router->get('/homepage',"Home#index");
$router->get('/homepage/:slug',"Home#index");

$router->get('/faq',"Faq#index");
$router->get('/cgu',"Cgu#index");
$router->get('/error-:id',"Error#generateError#id");
$router->get('/contact',"Contact#index");
$router->get('/dashboard',"Dashboard#index");
$router->post('/dashboard',"Dashboard#searchPatient");

/**Register**/
$router->get('/register',"Register#index");
$router->post('/register',"Register#register");

/**Login**/
$router->get('/login',"Login#index");
$router->post('/login',"Login#login");
$router->post('/logout',"Login#logout");
$router->get('/set-new-password',"ForgetPassword#index");

/**Profil**/
$router->get('/profil',"Profil#index");
$router->post('/profil',"Profil#change");

/**Aides**/
$router->get('/help', "Aides#index");

/**Test**/
$router->get('/test',"Exam#index");
$router->post('/test-options',"Exam#setUpTest");
$router->post('/test-confirm',"Exam#confirmTest");
$router->get('/test-summary',"Exam#launchTest");
$router->post('/test-summary',"Exam#submitComment");
$router->get('/set-new-password',"ForgetPassword#index");

/**Contact**/
$router->get('/contact',"Contact#index");
$router->post('/contact',"Contact#sendMail");
$router->get('/contact-admin',"Contact#contactAdminIndex");
$router->get('/contact-admin',"Contact#contactAdmin");



/** Forum **/
$router->get('/forum',"Forum\Forum#index");
$router->post('/forum/result-threads',"Forum\Forum#searchResult");
$router->get('/forum/thread-:id',"Forum\Forum#showThreadById#id");
$router->get('/forum/tag-:id',"Forum\Forum#showTagById#id");
$router->post('/forum/result-threads-tag-:id',"Forum\Forum#searchResult#id");



/**Admin**/
$router->get('/admin/dashboard',"Admin#index");
$router->get('/admin/add-user',"Admin#addUserIndex");
$router->post('/admin/add-user',"Admin#addUser");
$router->get('/admin/edit-faq',"Admin#editFAQIndex");
$router->post('/admin/edit-faq',"Admin#editFAQ");
$router->get('/statistics','Admin#stats');

$router->get('/error','Error#index');

$router->run();
