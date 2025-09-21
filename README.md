Nome: Ítalo Ricci RA:1993169

Nome: José Henrique Ribeiro dos Santos RA:1994042

---------------------------------------------------------

**Instruções de Execução**

  Instale e abra o XAMPP.
  
  De Start no "apache".

**Verifique se a pasta do projeto está em:**

  C:\xampp\htdocs\
  
  Abra no navegador:
  http://localhost/p1_at2/index.php

**Funcionalidades do Sistema de Cadastro de Usuários:**
  1. Cadastro de Usuário:
  
  O sistema permite cadastrar um novo usuário.
  
  Ao cadastrar, o sistema valida o e-mail e a senha fornecidos.
  
  2. Validação de E-mail:
  
  O e-mail fornecido pelo usuário é validado para garantir que siga o formato padrão de e-mail.
  
  Validação do E-mail com filter_var:
  
  A função filter_var é usada para validar se o e-mail informado segue o formato correto de um endereço de e-mail.
  
  A constante FILTER_VALIDATE_EMAIL é utilizada como parâmetro para filter_var. Ela verifica se o e-mail fornecido é válido, ou seja, se está de acordo com a sintaxe de um e-mail.
  
  Caso o e-mail não esteja de acordo com a norma, como um e-mail com dois sinais de @ ou caracteres inválidos, o sistema retornará a mensagem "E-mail inválido".
  
  Exemplo: Se o usuário tentar cadastrar um e-mail como "marta@@gmail.com", o sistema identificará que ele está em formato errado e exibirá a mensagem "E-mail inválido".
  
  3. E-mail Único:
  
  O sistema verifica se o e-mail informado já está em uso.
  
  Se o e-mail já estiver cadastrado, o sistema retorna a mensagem "E-mail já está em uso".
  
  4. Validação de Senha:
  
  A senha deve atender a alguns critérios de segurança, como ter pelo menos 8 caracteres, uma letra maiúscula e um número.
  
  Se a senha não atender a qualquer uma dessas condições, o sistema retornará uma mensagem explicando qual critério não foi atendido.
  
  O objetivo é garantir que a senha fornecida seja forte o suficiente para proteção da conta.
  
  5. Login de Usuário:
  
  Durante o login, o sistema verifica se o e-mail e a senha fornecidos são válidos.
  
  As senhas são armazenadas de forma segura utilizando um algoritmo de hash para evitar que a senha seja salva em formato de texto simples.
  
  Ao tentar realizar o login, o sistema compara a senha fornecida com o hash da senha armazenada. Isso é feito através da função password_verify, que compara a senha digitada com a versão criptografada      armazenada no sistema.
  
  Se a senha fornecida durante o login for correta, o sistema permitirá o acesso, caso contrário, o login falha e a mensagem "E-mail ou senha inválido" será exibida.
  
  6. Reset de Senha:
  
  O sistema permite que o usuário altere sua senha a qualquer momento.
  
  Após o reset da senha, a nova senha é validada de acordo com os critérios de segurança e então armazenada de forma segura no banco de dados utilizando um algoritmo de hash.

**Regras de Negócio:**
  1. E-mail Único:
  
  O sistema não permite que dois usuários utilizem o mesmo e-mail. Se o e-mail já estiver em uso, o sistema retorna a mensagem "E-mail já está em uso".
  
  2. E-mail Válido:
  
  O e-mail fornecido deve seguir o formato padrão de e-mail (por exemplo, exemplo@gmail.com).
  
  Caso o e-mail seja inválido (por exemplo, "marta@@gmail.com"), o sistema retornará a mensagem "E-mail inválido".
  
  3. Senha Válida:
  
  A senha deve ter pelo menos 8 caracteres, uma letra maiúscula e pelo menos um número.
  
  Se algum desses requisitos não for atendido, o sistema retornará um erro informando qual critério não foi atendido.
  
  4. Cadastro Bem-Sucedido:
  
  Se o e-mail for válido, não estiver em uso, e a senha for válida, o usuário será cadastrado com sucesso.
  
  O sistema exibirá a mensagem "Usuário cadastrado com sucesso!".
  
  5. Login:
  
  O login será bem-sucedido se o e-mail e a senha corresponderem aos dados cadastrados.
  
  Se os dados estiverem incorretos, o sistema exibirá "E-mail ou senha inválido".

**Limitações do Sistema:**
 1. Persistência de Dados:
 
 O sistema não persiste dados em banco de dados real.
 
 Se o servidor for reiniciado ou a aplicação for recarregada, todos os dados dos usuários serão perdidos.
 
 2. Interface de Usuário:
 
 A interface é simples, baseada em echo e HTML básico.
 
 Não há uma interface gráfica avançada ou uso de frameworks modernos de frontend.
 
 3. Sem Sessões Entre Usuários:
 
 O sistema não mantém sessões de usuários entre acessos.
 
 O estado dos dados é reiniciado a cada acesso ou atualização de página, sem persistência de sessão entre usuários.

**Caso 1: Cadastro Válido**

  Entrada:
  
  Nome: José Henrique
  
  E-mail: jose@gmail.com
  
  Senha: Teste123
  
  Ação: Cadastrar um usuário com um e-mail único e senha válida.
  
  Saída Esperada:
  
  Exibição: "Usuário cadastrado com sucesso!"

**Caso 2: Cadastro Válido**

  Entrada:
  
  Nome: Ítalo Ricci
  
  E-mail: italo@gmail.com
  
  Senha: Senha123
  
  Ação: Cadastrar um usuário com um e-mail único e senha válida.
  
  Saída Esperada:
  
  Exibição: "Usuário cadastrado com sucesso!"

**Caso 3: E-mail Inválido**

  Entrada:
  
  Nome: Marta
  
  E-mail: marta@@gmail.com (erro de sintaxe no e-mail)
  
  Senha: Senha1234
  
  Ação: Tentar cadastrar um usuário com um e-mail inválido.
  
  Saída Esperada:
  
  Exibição: "E-mail inválido"

**Caso 4: Login com Senha Incorreta**

  Entrada:
  
  E-mail: jose@gmail.com
  
  Senha: Teste124 (senha incorreta)
  
  Ação: Tentar realizar o login com o e-mail correto e a senha errada.
  
  Saída Esperada:
  
  Exibição: "E-mail ou senha inválido"

**Caso 5: Reset de Senha**

  Entrada:
  
  ID: 1
  
  Nova Senha: Novoteste123
  
  Ação: Realizar o reset da senha para o usuário de ID 1.
  
  Saída Esperada:
  
  Exibição: "Senha alterada com sucesso!"

**Caso 6: Cadastro com E-mail Duplicado
**
  Entrada:
  
  Nome: Ítalo Ricci
  
  E-mail: italo@gmail.com
   (e-mail já utilizado em outro cadastro)
  
  Senha: Senha123
  
  Ação: Tentar cadastrar um usuário com um e-mail já utilizado.
  
  Saída Esperada:
  
  Exibição: "E-mail já está em uso"
