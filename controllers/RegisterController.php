<?php 
namespace controllers;

use core\Controller;
use core\Request;
use models\RegisterModel;

class RegisterController extends Controller{
    public function index(Request $request){
       $registerModel=new RegisterModel();
        if($request->is_Post()){
            $body=$request->body();
            var_dump($body);
            exit;
        }
        return $this->view('register');
        
    }
}