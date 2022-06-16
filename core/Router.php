<?php 
namespace core;

class Router{
    public array $routers;
    public function get($path,$callback){
        $this->routers['get'][$path]=$callback;
    }
    public function post($path,$callback){
        $this->routers['post'][$path]=$callback;
    }
    public function resolve(){
        return "Router";
    }
}