<?php 
namespace core;
use core\Router;
use core\Request;
class Application{
    public Router $router;
    public Request $request;
    public static string $path;
    public static Application $app;
    public function __construct($path){
    self::$app=$this;
    self::$path=$path;
    $this->request=new Request();
    $this->router=new Router($this->request);
    }
    public function run(){
        echo $this->router->resolve();
    }
}