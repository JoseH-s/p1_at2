<?php

class Validator{

    public static function validarEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return "E-mail inválido";
        }
        
    }

    public static function validarSenha(string $senha)
    {
        if(strlen($senha) < 8){
            return "A senha deve ter pelo menos 8 caracteres";
        }
        if(!preg_match('/[A-Z]/', $senha)){
            return "A senha deve ter pelo menos uma letra maiúscula";
        }
        if(!preg_match('/\d/', $senha)){
            return "A senha deve ter pelo menos um número";
        }
        return true;
    }

    public static function emailExiste(string $email, array $usuarios)
    {
        foreach($usuarios as $usuario){
            if($usuario->getEmail() === $email){
                return "E-mail já está em uso";
            }
        }
        return true;
    }
}