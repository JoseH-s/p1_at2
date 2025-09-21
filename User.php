<?php

Class User{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;

    public function __construct($id, $nome, $email, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function __toString(): string {
        return "ID: " . $this->getId() . ", Nome: " . $this->getNome() . ", Email: " . $this->getEmail();
    }
}