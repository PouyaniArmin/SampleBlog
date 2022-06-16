<?php 
namespace core;

class Request{
    public function path(){
        $path=$_SERVER['REQUEST_URI'] ?? '';
        $position=strpos($path,'?');
        if(!$position){
            return $path;
        }
        echo substr($path,0,$position);
    }
    public function method(){
        echo strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function body(){

    }
}