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
        $test = new ModelRegisterModel();
        if ($request->is_Post()) {
            $test->loadData($request->body());
            if ($test->validate() && $test->register()) {
                return "yes";
            }
        }
        return $this->view('register');
    }
}
