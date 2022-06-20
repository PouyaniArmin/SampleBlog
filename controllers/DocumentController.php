<?php 
namespace controllers;
use core\Controller;
class DocumentController extends Controller{
    public function index(){
        $data=['name'=>'armin'];
        return $this->view('document',$data);
    }
}