<?php

include '../include/functions.php';

/*$data = array(
		"name" => 'User Teste',
		"email" => 'teste@gmail.com',
		"password" => '00000000'
);	*/


// LOGANDO USUARIO USANDO METODO POST
	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
				
	$data = array(
		"email" => 'teste@gmail.com',
		"password" => '00000000'
	);			

$get_data = callAPI('POST', 'http://localhost/crud2/login.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($response);
//     [token] => eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3BocF9hdXRoX2FwaVwvIiwiYXVkIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9waHBfYXV0aF9hcGlcLyIsImlhdCI6MTY2MDc0NzUwOSwiZXhwIjoxNjYwNzUxMTA5LCJkYXRhIjp7InVzZXJfaWQiOiI4In19.eKREjlJrvasKAtgGD7SL_qx4zBCGFeUqvep-uXXPvR8
