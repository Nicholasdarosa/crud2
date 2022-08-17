<?php

include '../include/functions.php';


/** CADASTRA USUARIO USANDO MÉTODO POST   
POST - http://localhost/crud2/register.php
Payload (JSON)
{
    "name":"username",
    "email":"useremail@mail.com",
    "password":"user password"
}
*/


$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
);
				
$data = array(
		"name" => 'User Teste',
		"email" => 'teste@gmail.com',
		"password" => '00000000'
);			



$get_data = callAPI('POST', 'http://localhost/crud2/register.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($response);
