<?php 
namespace core;

class Controller{
    public string $layout='main';
    public function view($view){
        return Application::$app->router->renderView($view);
    }
    public function setLayout($layout){
        $this->layout=$layout;
    }
}