<?php 
namespace controllers;

use core\Controller;

class LoginController extends Controller{

    public function index(){
        return $this->view('login');
    }
}