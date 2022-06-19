<?php

namespace controllers;

use core\Application;
use core\Controller;

class HomeController extends Controller{
    public function index(){
        return $this->view('home');
    }
}