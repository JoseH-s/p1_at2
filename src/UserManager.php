<?php

require_once 'User.php';
require_once 'Validator.php';

class UserManager
{
    private array $users = [];

    public function createUser(User $user): bool
    {
        $emailValidate = Validator::validateEmail($user->getEmail());
        if ($emailValidate !== true) {
            echo "E-mail inválido";
            return false;
        }

        $emailValidate = Validator::emailExist($user->getEmail(), $this->users);
        if($emailValidate){
            echo "E-mail ja cadastrado";
            return false;
        }

        $user->setPassword($user->getPassword());
        $this->users[] = $user;
        
        echo "Usuário cadastrado com sucesso!". "<br>";
        return true;
    }


    public function login(string $email, string $password): bool 
    {
        foreach($this->users as $user){
            if(!Validator::emailExist($email , $this->users)){
                echo "email não cadastrado";
                return false;
            }
            if(!password_verify($password, $user->getPassword())){
                echo "senha incorreta";
                return false;
            }
        }
        echo"Login realizado com sucesso";
        return true;

    }

    public function resetPassword(string $email, string $newPassword): void
    {
        foreach($this->users as $user){
            if(!Validator::emailExist($email , $this->users)){
                echo "email não cadastrado";
                return;
            }
            
                $user->setPassword(password_hash($newPassword, PASSWORD_DEFAULT));
                echo "Senha alterada com sucesso!";
                return;
                
            }
        
    }
}



