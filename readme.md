﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<div style="margin-left:30px;" class="" >

<h1>API RESTful de login e registro em PHP</h1><br>

1 - Configuração do banco de dados MySQL<br>
	- Nome do banco de dados: crud2<br>
	- Nome da Tabela: <strong>users</strong> e <strong>items</strong><br>

- criei um novo banco de dados chamado  crud2<br>

- Depois disso, use o seguinte código SQL para criar a  tabela users e a estrutura desta tabela<br>

<pre>
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
 `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
 `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
</pre>
<br>
<pre>
CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
</pre>
<p><br>
  2. Extraindo arquivos e pastas e configurando o servidor<br> 
  - Extraia o arquivo <strong>crud2.zip </strong>dentro da pasta do seu servidor. Se for Xampp geralmente fica em <strong>C:\xampp\htdocs</strong>.<br>
  - Voce terá uma estrutura igual a essa. Coloque os dados do banco de dados nos seguintes arquivos:<br>
include/Database.php<br>
include/functions.php<br>
  <img src="img1.jpg">
  
  
</p>
<h1>Arquivos</h1>
 include/Database.php – Para fazer a conexão com o banco de dados.<br>
include/JwtHandler.php – Para lidar com as ações do JWT, como codificação e token de decodificação.<br>
AuthMiddleware.php - Este arquivo é para verificar se o token de autenticação é válido ou não.<br>
register.php – Para registro de usuário.<br>
login.php – Para login de usuário.<br>
Create.php – Cria um item no banco de dados<br>
Read.php – Ler um item no banco de dados<br>
Update.php – Atualiza um item no banco de dados<br>
Delete.php – Deleta um item no banco de dados<br>
<br>


<h2>3. Teste da API de login e registro do PHP</h2>
<pre>3.1 register.php
POST - http://localhost/crud2/register.php
Payload (JSON)
{
    "name":"username",
    "email":"useremail@mail.com",
    "password":"user password"
}
</pre>


<h2>3.2 login.php</h2>
POST - http://localhost/crud2/login.php
<pre>Payload (JSON)
{
    "email":"useremail@mail.com",
    "password":"user password"
}
</pre>




<h2>3.3 getUser.php</h2>
<pre>GET - http://localhost/crud2/getUser.php
Payload (Header)
Authorization - Bearer Token</pre>



<h2>(Create) Criar um item no banco de dados</h2>
<pre>
Ver no arquivo de exemplos "exemplos/CriarItemPost.php"
</pre>

<h2>(Read)Ler items pelo ID ou sem o ID</h2>
<pre>
Ver no arquivo de exemplos "exemplos/ListarItemsGet.php"
</pre>


<h2>(Update)Atualizar um item no banco de dados</h2>
<pre>
Ver no arquivo de exemplos "exemplos/AtualizarItemPost.php"
</pre>


<h2>(Delete) Deletar um item no banco de dados pelo ID</h2>
<pre>
Ver no arquivo de exemplos "exemplos/DeleteItemPost.php"
</pre>


Caso esteja usando o Postman, um exemplo para criar um item pode ser usado como listado abaixo:<br>


<h2>(Create) Criar um item no banco de dados</h2>
Ver no arquivo de exemplos "exemplos/CriarItemPost.php"
<pre>
POST - http://localhost/crud2/Create.php
{
"name": "Celular motorola",
"description": "Celular moderno e bonito",
"price":"1500",
"category_id":"2"
}</pre>











</div>
</body>
</html>
