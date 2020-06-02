<?php

namespace src;

use Exception;
use src\Config\Config;
use src\Config\ConfigException;
use ViewException;

/**
 * Class modeling a view. *
 *
 * @author TechCare ©
 */
class View
{
    /** Name of the file associated with the view */
    private $file;

    /** View title (defined in the view file) */
    private $title;
    private $head_tags;


    /**
     * Constructor.
     *
     * @param string $action Action with which the view is associated
     * @param string $controller Name of the controller with which the view is associated
     */
    public function __construct($action, $controller = "")
    {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        // La convention de nommage des fichiers vues est : View/<$controller>/<$action>.php
        $file = "App/View/";
        if ($controller != "") {

            $params=explode("\\",$controller);
            $file = $file . $params[2] . "/";
        }
        $this->file = $file . $action . ".php";
    }

    /**
     * Generate and display the view.
     *
     * @param array $data Data required to generate the view
     * @throws ConfigException
     * @throws ViewException
     * @throws \ConfigException
     */
    public function generate($data)
    {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);

        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controller/action/id
        $webRoot = Config::get("webRoot", "/");
        // Génération du template commun utilisant la partie spécifique
        $vue = $this->generateFile('App/View/template.php',
            array('title' => $this->title, 'content' => $content, 'webRoot' => $webRoot,'head_tags'=>$this->head_tags));
        // Renvoi de la vue générée au navigateur
        echo $vue;
    }

    /**
     * Generates a view file and returns the result produced.
     *
     * @param string $file Path of the view file to generate
     * @param array $data Data required to generate the view
     * @return string Result of view generation
     * @throws ViewException If the view file cannot be found
     * @throws Exception
     */
    private function generateFile($file, $data)
    {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);

            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;


            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

    /**
     * Clean up a value inserted in an HTML page.
     * Must be used each time dynamic data is inserted into a view.
     * Avoids unwanted code execution (XSS) problems in generated views.
     *
     * @param string $value Value to clean up
     * @return string Cleaned value
     */
    private function clean($value)
    {
        // Convertit les caractères spéciaux en entités HTML
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

}