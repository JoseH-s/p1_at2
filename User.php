<?php

Class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->nome = $name;
        $this->email = $email;
        $this->senha = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function __toString(): string {
        return "ID: " . $this->getId() . ", Nome: " . $this->getNome() . ", Email: " . $this->getEmail();
    }

}
