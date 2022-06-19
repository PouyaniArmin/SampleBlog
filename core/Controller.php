<?php 
namespace core;

class Controller{
    public function view($view){
        return Application::$app->router->renderView($view);
    }
}