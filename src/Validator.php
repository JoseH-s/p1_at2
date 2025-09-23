<?php

class Validator
{

    public static function validarEmail(string $email):bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
        
    }

    public static function validarPassword(string $password)
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
                echo `O `.$email.` ja existe`;
                return true;
                
            }
        }
        return false;
    }
}