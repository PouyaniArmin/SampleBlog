<?php

namespace core;

abstract class Model
{
    public array $errors;
    public function loadData($data)
    {
        foreach($data as $key=>$value){
            if(property_exists($this,$key)){
                $this->{$key}=$value;
            }
        }
    }

    abstract function rules():array;

    public function validate(){
        
    }
}
