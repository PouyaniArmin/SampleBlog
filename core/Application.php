<?php 
namespace core;
use core\Router;
use core\Request;
use core\Response;
class Application{
    public Router $router;
    public Response $response;
    public Request $request;
    public static string $path;
    public static Application $app;
    public function __construct($path){
    self::$app=$this;
    self::$path=$path;
    $this->request=new Request();
    $this->response=new Response();
    $this->router=new Router($this->request,$this->response);
    }
    public function run(){
        echo $this->router->resolve();
    }
}