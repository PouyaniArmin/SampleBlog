<?php 
namespace models;

use core\Model;

class RegisterModel extends Model{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register(){
        return "submitted";
    }

    public function rules():array{
        return[];
    }
}