<?php


namespace Autoloader;


/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Register the autoloader.
     */
    static function register($autoload){
        spl_autoload_register(array(__CLASS__, $autoload));
    }

    /**
     * Require the file corresponding to our class.
     *
     * @param $class string class name to register
     */
    static function autoload($class){
        if(strpos("Router",dirname($class))){
            require "src/Router/$class.php";
        } else{
            require "src/$class.php";
        }
    }
    static function autoloadController($class){
        require "App/Controller/$class.php";

    }
    static function autoload2($class){
        require "../src/Router/$class.php";

    }

}