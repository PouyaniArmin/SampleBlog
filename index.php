<?php

use controllers\DocumentController;
use controllers\HomeController;
use core\Application;
use controllers\LoginController;
use controllers\RegisterController;

require_once './vendor/AutoLoader.php';
$app=new Application(__DIR__);
$app->router->get('/',[HomeController::class,'index']);
$app->router->get('/document',[DocumentController::class,'index']);
$app->router->get('/login',[LoginController::class,'index']);
$app->router->get('/register',[RegisterController::class,'index']);
$app->router->post('/register',[RegisterController::class,'index']);
$app->run();