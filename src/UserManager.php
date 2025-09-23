<?php


require_once 'User.php';
require_once 'Validator.php';

class UserManager
{
    private array $users = [];
    private int $lastUserId = 0;
    public function createUser(User $user): bool
    {
        $emailValidate = Validator::validateEmail($user->getEmail());
        if($emailValidate !== true) {
            echo "E-mail inválido";
            return false;
        }
        $emailValidate = Validator::emailExist($user->getEmail(), $this->users);
        if($emailValidate) {
            echo "E-mail ja cadastrado";
            return false;
        }
        $passwordValidate = Validator::validatePassword($user->getPassword());
        if($passwordValidate !== true) {
            echo $passwordValidate;
            return false;
        }
        $user->setPassword($user->getPassword());
        $this->users[] = $user;
        $user->setId($this->generateUserId());
        echo "ID: " . $user->getId() . "<br> Usuário email: ". $user->getEmail().  " cadastrado com sucesso!" . "<br>";
        return true;
    }
    public function generateUserId(): int
    {
        $this->lastUserId++;
        return $this->lastUserId;
    }
    public function login(string $email, string $password): bool
    {
        if(!Validator::emailExist($email, $this->users)) {
            echo "email não cadastrado";
            return false;
        }
        foreach ($this->users as $user) {
            if($user->getEmail() === $email) {
                if(!password_verify($password, $user->getPassword())) {
                    echo "senha incorreta";
                    return false;
                }
                echo "Login realizado com sucesso";
                return true;
            }
        }
        return false;
    }

    public function resetPassword(int $id, string $newPassword): void
    {
        foreach ($this->users as $user) {
            if($user->getId() === $id) {
                $user->setPassword($newPassword);
                echo "Senha alterada com sucesso!";
                return;
            }
        }
        echo "Usuário não encontrado";
    }
}
