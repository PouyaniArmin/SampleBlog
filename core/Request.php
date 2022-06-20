<?php 
namespace core;

class Request{
    public function path(){
        $path=$_SERVER['REQUEST_URI'] ?? '';
        $position=strpos($path,'?');
        if($position===false){
            return $path;
        }
        return substr($path,0,$position);
    }
    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){
        return $this->method()==='get';
    }
    public function isPost(){
        return $this->method()==='post'; 
    }
    public function body(){
        $body=[];
        foreach($_GET as $key=>$value){
            $body[$key]=$value;
        }
        foreach ($_POST as $key=>$value){
            $body[$key]=$value;
        }
        return $body;
    }
}