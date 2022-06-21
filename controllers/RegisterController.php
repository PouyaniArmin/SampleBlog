<?php 
namespace controllers;

use core\Controller;
use core\Request;

class RegisterController extends Controller{
    public function index(Request $request){
    
        return $this->view('register');
        
    }
}