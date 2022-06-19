<?php

use controllers\DocumentController;
use controllers\HomeController;
use core\Application;

require_once './autoLoader/AutoLoader.php';
$app=new Application(__DIR__);
$app->router->get('/',[HomeController::class,'index']);
$app->router->get('/document',[DocumentController::class,'index']);
$app->run();