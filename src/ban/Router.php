<?php
//namespace APP;


require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';
/**

 * Routing class for incoming requests.
 *
 * @author TechCare ©
 */
class Router
{

    /**
     * Main method called by the front controller.
     * Examine the request and take the appropriate action.
     */
    public function routerRequest()
    {
        try {
            // Fusion des paramètres GET et POST de la requête
            // Permet de gérer uniformément ces deux types de requête HTTP
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->manageError($e);
        } catch (\Exception $e) {
        }
    }

    /**
     * Instantiate the appropriate controller according to the request received
     *
     * @param Request $request Received request
     * @return Controller Instance of a controller
     * @throws RequestException
     * @throws RouterException
     * @throws \Exception
     */
    private function createController(Request $request)
    {
        // Grâce à la redirection, toutes les URL entrantes sont du type :
        // index.php?controller=XXX&action=YYY&id=ZZZ

        $controller = "Tag";  // Contrôleur par défaut
        if ($request->isThereParameter('controller')) {
            $controller = $request->getParameter('controller');
            // Première lettre en majuscule
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        // La convention de nommage des fichiers controleurs est : Controller/Controller<$controller>.php
//        $controllerClass = "Controller" . $controller;
//        $controllerFile = "App/Controller/Forum/" . $controllerClass . ".php";
        if (true) { /*file_exists($controllerFile)*/
            // Instanciation du contrôleur adapté à la requête
//            require($controllerFile);
            $controller = new  ControllerTag();        /*$controllerClass()*/;
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new \Exception("Fichier '$controllerFile' introuvable");
        }
    }

    /**
     * Determines the action to be performed based on the request received
     *
     * @param Request $request Received request
     * @return string Action to perform
     * @throws RequestException
     */
    private function createAction(Request $request)
    {
        $action = "index";  // Action par défaut
        if ($request->isThereParameter('action')) {
            $action = $request->getParameter('action');
        }
        return $action;
    }

    /**
     * Handles a runtime error (exception)
     *
     * @param Exception $exception Exception that has occurred
     * @throws ConfigException
     * @throws ViewException
     */
    private function manageError(Exception $exception)
    {
        $view = new View('error');
        $view->generate(array('msgError' => $exception->getMessage()));
    }

}