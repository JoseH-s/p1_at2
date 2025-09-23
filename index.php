<?php

require_once 'src/UserManager.php';
require_once 'src/User.php';

$userManager = new UserManager();

// Caso 1 - Cadastro com senha invalida
$usuario1 = new User("José Henrique", "jose@gmail.com", "teste123");
echo $usuario1;
echo "<br>";
$userManager->createUser($usuario1);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";
// caso 1 - cadastro com senha valida
$usuario2 = new User("Ítalo Ricci", "italo@gmail.com", "Senha123");
echo $usuario2;
echo "<br>";
$userManager->createUser($usuario2);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 2 - Cadastro com e-mail inválido
$usuario3 = new User("Marta", "marta@@gmail.com", "Senha1234");
echo $usuario3;
echo "<br>";
$userManager->createUser($usuario3);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 3 - Tentativa de login com senha errada
$usuario1 = new User("José Henrique", "jose@gmail.com", "Teste123");
echo $usuario1;
echo "<br>";
$userManager->login("jose@gmail.com", "Teste124");
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 5 - Cadastro de usuário validação de login
$usuario7 = new User("Ítalo Ricci", "italo7@gmail.com", "Senha123");
$userManager->createUser($usuario7);
echo "<br>CASO 5<br>";
$userManager->login("italo7@gmail.com", "Senha123");
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 4 - Reset de senha válido
echo $usuario1;
echo "<br>";
$userManager->resetPassword(1, "Novoteste123");
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";

// Caso 5 - Cadastro de usuário com e-mail duplicado
$usuario2 = new User("Ítalo Ricci", "italo@gmail.com", "Senha123");
echo $usuario2;
echo "<br>";
$userManager->createUser($usuario1);
echo "<br>";
echo "-----------------------------------------------------------------<br><br>";





