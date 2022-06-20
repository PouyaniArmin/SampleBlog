<?php

namespace controllers;

use core\Application;
use core\Controller;

class HomeController extends Controller{
    public function index(){
        $data=['name'=>'armin'];
        return $this->view('home',['name'=>'armin']);
    }
}