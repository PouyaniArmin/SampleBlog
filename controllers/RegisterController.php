<?php

namespace controllers;

use core\Controller;
use core\Request;
use model\RegisterModel as ModelRegisterModel;
use models\RegisterModel;
use models\Test;

class RegisterController extends Controller
{
    public function index(Request $request)
    {

        if($request->is_Post()){
           $test=new ModelRegisterModel();
           $test->register();
        }
        return $this->view('register');   
    }
}
