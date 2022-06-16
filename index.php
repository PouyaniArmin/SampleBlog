<?php

use core\Application;

require_once './autoLoader/AutoLoader.php';
$app=new Application();
$app->router->get('/','home');
$app->run();