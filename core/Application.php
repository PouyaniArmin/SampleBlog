<?php 
namespace core;
use core\Router;
use core\Request;
class Application{
    public Router $router;
    public Request $request;
    public function __construct(){
    $this->router=new Router();
    $this->request=new Request();
    }
    public function run(){
        echo $this->router->resolve();
    }
}