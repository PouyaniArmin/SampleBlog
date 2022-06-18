<?php 
namespace core;
use core\Request;
class Router{
    public Request $request;
    public array $routers;
    public function __construct(Request $request){
        $this->request=$request;
    }
    public function get($path,$callback){
        $this->routers['get'][$path]=$callback;
    }
    public function post($path,$callback){
        $this->routers['post'][$path]=$callback;
    }
    public function resolve(){
        $path=$this->request->path();
        $method= $this->request->method();
        $callback=$this->routers[$method][$path] ?? false;
        if(!is_string($callback)){
            return "Not Found";
        }
        return $this->renderView($callback);
    }
    public function renderView($view){
        require_once Application::$path."/views/home.php";
    }
    
}