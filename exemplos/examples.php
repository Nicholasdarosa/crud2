<?php
require __DIR__ . '/include/functions.php';



/** CADASTRA USUARIO USANDO MÉTODO POST
POST - http://localhost/crud2/register.php
Payload (JSON)
{
    "name":"username",
    "email":"useremail@mail.com",
    "password":"user password"
}
*/


/*	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
				
	$data = array(
		"name" => 'Everaldo',
		"email" => 'souzaeveras@gmail.com',
		"password" => '12345678'
	);			

$get_data = callAPI('POST', 'http://localhost/crud2/register.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($response);*/







// LOGANDO USUARIO USANDO METODO POST
/*	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
				
	$data = array(
		"email" => 'souzaeveras@gmail.com',
		"password" => '12345678'
	);			

$get_data = callAPI('POST', 'http://localhost/crud2/login.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($response);*/
//     [token] => eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3BocF9hdXRoX2FwaVwvIiwiYXVkIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9waHBfYXV0aF9hcGlcLyIsImlhdCI6MTY2MDc0NzUwOSwiZXhwIjoxNjYwNzUxMTA5LCJkYXRhIjp7InVzZXJfaWQiOiI4In19.eKREjlJrvasKAtgGD7SL_qx4zBCGFeUqvep-uXXPvR8










/* LOGA USANDO TOKEN DE ACESSO

$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
		"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3BocF9hdXRoX2FwaVwvIiwiYXVkIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9waHBfYXV0aF9hcGlcLyIsImlhdCI6MTY2MDc0NzUwOSwiZXhwIjoxNjYwNzUxMTA5LCJkYXRhIjp7InVzZXJfaWQiOiI4In19.eKREjlJrvasKAtgGD7SL_qx4zBCGFeUqvep-uXXPvR8",
	);
				
	$data = array(
		
	);			

$get_data = callAPI('GET', 'http://localhost/crud2/getUser.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($response);

*/















// CREATE
/*	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
	$data = array(
		"name" => 'Usha Sewing Machine',
		"description" => 'Description',
		"price" => '654',
		"category_id" => '12',
		"created" => '01-02-2022'
	);			

$get_data = callAPI('POST', 'http://localhost/crud2/Create.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($get_data);*/




//DELETE
	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
	$data = array(
		"id" => '4',
	);			

$get_data = callAPI('POST', 'http://localhost/crud2/Delete.php',  $data, $header);
$response = json_decode($get_data);

print_r($get_data);
/**/




//GET
/*	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
	$data = array(
		"id" => '',
	);			

$get_data = callAPI('GET', 'http://localhost/crud2/Read.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($get_data);*/





//UPDATE
	/*$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
		$data = array(
		"name" => 'ooooooooooine',
		"description" => 'hhhhhhhhhh',
		"price" => '654',
		"category_id" => '12',
		"id" => '5'
	);		

$get_data = callAPI('POST', 'http://localhost/crud2/Update.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($get_data);*/


?>