<?php 
namespace controllers;

use core\Controller;

class RegisterController extends Controller{
    public function index(){
        return $this->view('register');
    }
}