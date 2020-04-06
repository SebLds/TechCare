<?php


class Router
{
    private $url;
    private $routes=[];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {

        $this->url = $url;
    }

    /**
     * @param $path
     * @param $callable
     */
    public function get($path, $callable){
        $route = new Route($path, $callable);
        $this->routes['GET'][]= $route;
    }

    /**
     * @param $path
     * @param $callable
     */
    public function post($path, $callable){
        $route = new Route($path, $callable);
        $this->routes['POST'][]= $route;
    }

    /**
     * @throws Exception
     */
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException("REQUEST_METHOD does not exist");
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException("No matching routes");
    }
}