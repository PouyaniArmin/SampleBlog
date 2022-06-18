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
        if(is_string($callback)){
        return $this->renderView($callback);
        }
        return call_user_func($callback);
    }
    public function renderView($view){
        $layoutView=$this->renderLayout();
        $contentView=$this->renderOnlyView($view);
        return str_replace("{{content}}",$contentView,$layoutView);
    }
    public function renderLayout(){
        ob_start();
        require_once Application::$path."/views/layouts/main.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view){
        ob_start();
        require_once Application::$path."/views/home.php";
        return ob_get_clean();
    }
}