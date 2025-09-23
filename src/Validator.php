<?php

class Validator
{

    public static function validateEmail(string $email):bool
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
        
    }
    public static function validatePassword(string $password)
    {
        if(strlen($password) < 8){
            return "A senha deve ter pelo menos 8 caracteres";
        }
        if(!preg_match('/[A-Z]/', $password)){
            return "A senha deve ter pelo menos uma letra maiúscula";
        }
        if(!preg_match('/\d/', $password)){
            return "A senha deve ter pelo menos um número";
        }
        return true;
    }

    public static function emailExist(string $email, array $users):bool
    {
        foreach($users as $user){
            if($user->getEmail() === $email){
                return true;
            }
        }
        return false;
    }
}