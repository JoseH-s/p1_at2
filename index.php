<?php

require_once 'UserManager.php';
require_once 'User.php';

$userManager = new UserManager();

// Caso 1 - Cadastro válido
$usuario1 = new User(1, "José Henrique", "jose@gmail.com", "Teste123");
echo $usuario1;
echo "<br>";
$userManager->cadastrarUsuario($usuario1);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

$usuario2 = new User(2, "Ítalo Ricci", "italo@gmail.com", "Senha123");
echo $usuario2;
echo "<br>";
$userManager->cadastrarUsuario($usuario2);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 2 - Cadastro com e-mail inválido
$usuario3 = new User(3, "Marta", "marta@@gmail.com", "Senha1234");
echo $usuario3;
echo "<br>";
$userManager->cadastrarUsuario($usuario3);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 3 - Tentativa de login com senha errada
echo $usuario1;
echo "<br>";
$userManager->login("jose@gmail.com", "Teste124");
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 4 - Reset de senha válido
echo $usuario1;
echo "<br>";
$userManager->resetarSenha(1, "Novoteste123");
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 5 - Cadastro de usuário com e-mail duplicado
$usuario4 = new User(4, "Ítalo Ricci", "italo@gmail.com", "Senha123");
echo $usuario4;
echo "<br>";
$userManager->cadastrarUsuario($usuario4);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";




