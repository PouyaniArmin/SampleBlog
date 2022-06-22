<?php
namespace model;

use core\Model;

class RegisterModel extends Model{
    public function register(){
        return "success";
    }
    public function rules():array{
        return [];
    }
}