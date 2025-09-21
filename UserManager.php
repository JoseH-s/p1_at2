<?php

require_once 'User.php';
require_once 'Validator.php';

class UserManager{
    private array $usuarios = [];

    public function cadastrarUsuario(User $usuario): void
    {
        $emailValido = Validator::validarEmail($usuario->getEmail());
        if ($emailValido !== true) {
            echo "E-mail inválido";
            return;
    }

        $emailValido = Validator::emailExiste($usuario->getEmail(), $this->usuarios);
        if($emailValido !== true){
            echo $emailValido;
            return;
        }

        $this->usuarios[] = $usuario;
        echo "Usuário cadastrado com sucesso!";
    }


    public function login(string $email, string $senha): void 
    {
        foreach($this->usuarios as $usuario){
            if($usuario->getEmail() === $email && password_verify($senha, $usuario->getSenha())){
                echo "Login realizado com sucesso!";
                return;
            }
        }
        echo"E-mail ou senha inválido";

    }

    public function resetarSenha(int $id, string $novaSenha): void
    {
        foreach($this->usuarios as $usuario){
            if($usuario->getId() === $id){
                $usuario->setSenha(password_hash($novaSenha, PASSWORD_DEFAULT));
                echo "Senha alterada com sucesso!";
                return;
            }
        }
        echo "Usuário não encontrado";
    }
}


