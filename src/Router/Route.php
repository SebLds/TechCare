<?php

namespace APP\Router;

class Route
{
    /** @var string Instanced route path */
    private $path;

    /** @var string Action to perform */
    private $callable;

    /** @var array Contains the matches, matches[0] full pattern, matches [1] the first captured parenthesized subpattern and so on */
    private array $matches;

    /** @var array  */
    private array $params=[];

    /**
     * Route constructor.
     * @param string $path Path of the route to instantiate
     * @param $callable
     */
    public function __construct($path, $callable)
    {
        $this->path = trim($path,'/');
        $this->callable = $callable;
    }

    /**
     * @param $param
     * @param $regex
     * @return $this
     */
    public function with($param, $regex){
        $this->params[$param]=str_replace('(','(?:', $regex);
        return $this;
    }


    public function match($url){
        $url=trim($url,'/');
        $path=preg_replace_callback('#:([\w]+)#',[$this,'paramMatch'],$this->path);
        $regex="#^$path$#i";
        if(!preg_match($regex,$url,$matches)){
            return false;
        }
        array_shift($matches);
        $this->matches=$matches;
        return true;
    }

    private function paramMatch($match){
        if(isset($this->params[$match[1]])){
            return '('. $this->params[$match[1]] .')';
        }
        return '([^/]+)';
    }
    public function call(){
        if(is_string($this->callable)){
            $params=explode('#',$this->callable);
            $controller="App\\Controller\\". $params[0]."Controller";
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]],$this->matches);
        }else{
            return call_user_func_array($this->callable,$this->matches);

        }
    }
    public function getUrl($params){
        $path=$this->path;
        foreach($params as $k => $value){
            $path = str_replace(":$k",$value,$path);
        }
        return $path;
    }
}