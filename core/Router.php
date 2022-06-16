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
        return "Router";
    }
}