<?php

namespace controllers;

use core\Application;

class HomeController{
    public function index(){
        return Application::$app->router->renderView('home');
    }
}