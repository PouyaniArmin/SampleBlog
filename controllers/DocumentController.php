<?php 
namespace controllers;
use core\Controller;
class DocumentController extends Controller{
    public function index(){
        return $this->view('document');
    }
}