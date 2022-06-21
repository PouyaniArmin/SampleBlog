<?php

namespace core;

abstract class Model
{
    public const RULE_REQUIRED='required';
    public const RULE_EMAIL='email';
    public const RULE_MIN='min';
    public const RULE_MAX='max';
    public const RULE_MATCH='min';
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
