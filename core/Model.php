<?php

namespace core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'min';
    public array $errors;
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $attribute=>$rules){
            $value=$this->{$attribute};
            foreach($rules as $rule){
                $ruleName=$rule;
                if(!is_string($ruleName)){
                    $ruleName=$rule[0];
                }
                if($ruleName===self::RULE_REQUIRED && !$value){
                    $this->addError($attribute,self::RULE_REQUIRED);
                }
                if($ruleName===self::RULE_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute,self::RULE_EMAIL);
                }

                if($ruleName===self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute,self::RULE_MIN);
                }

                if($ruleName===self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addError($attribute,self::RULE_MAX);
                }

                if($ruleName===self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    $this->addError($attribute,self::RULE_MATCH);
                }
            }
        }
    }
    public function addError(string $attribute,string $rule){
        if($rule===self::RULE_REQUIRED){
            echo "<pre>".$attribute."=> this is field required"."</pre>";
        }
        if($rule===self::RULE_EMAIL){
            echo "<pre>".$attribute."=> this is field must be valid"."</pre>";
        }
        if($rule===self::RULE_MIN){
            echo "<pre>".$attribute."=> this is field must be 6 character"."</pre>";
        }
        if($rule===self::RULE_MAX){
            echo "<pre>".$attribute."=> this is field must be fewer 24 character"."</pre>";
        }
        if($rule===self::RULE_MATCH){
            echo "<pre>".$attribute."=> this is not match password"."</pre>";
        }
    }
}
