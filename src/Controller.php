<?php

namespace src;
use ControllerException;
use Exception;
use src\Config\Config;
use src\Config\ConfigException;

/**
 * Controller abstract class.
 * Provides common services to derived controller classes.
 *
 * @author TechCare ©
 */
abstract class Controller
{
    /** Action to perform */
    private ?string $action = null;

    /** Incoming request */
//    protected Request $request;
//
//    /**
//     * Defines the incoming request.
//     *
//     * @param Request $request Incoming request
//     */
//    public function setRequest(Request $request)
//    {
//        $this->request = $request;
//    }

    /**
     * Executes the action to be performed.
     * Calls the method with the same name as the action on the current Controller object.
     *
     * @param $action
     * @throws Exception If the action does not exist in the current Controller class
     */
    public function executeAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $controllerClass = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $controllerClass");
        }
    }

    /**
     * Abstract method corresponding to the default action.
     * Forces derived classes to implement this action by default.
     */
    public abstract function index();

    /**
     * Generate the view associated with the current controller.
     *
     * @param array $viewData Data required for view generation
     * @param string $action Action associated with the view (allows a controller to generate a view for a specific action)
     */
    protected function generateView($viewData = array(), $action = null)
    {
        // Utilisation de l'action actuelle par défaut
        $viewAction = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $viewAction = $action;
        }
        // Utilisation du nom du contrôleur actuel
        $controllerClass = get_class($this);
        $controllerView = str_replace("Controller", "", $controllerClass);

        // Instanciation et génération de la vue
        $vue = new View($viewAction, $controllerView);
        $vue->generate($viewData);
    }

    /**
     * Redirect to a controller and a specific action.
     *
     * @param string $controller
     * @param string $action
     * @throws ConfigException
     */
    protected function redirect($controller, $action = null)
    {
        $webRoot = Config::get("webRoot", "/");
        // Redirection vers l'URL /racine_site/controller/action
        header("Location:" . $webRoot . $controller . "/" . $action);
    }

    public static function getText($key){
        $lang=$_SESSION['lang'];
        $json = file_get_contents("Web/js/jquery.i18n/languages/$lang.json");
        $parsed_json = json_decode($json);
        return $parsed_json->{$key};
    }


}