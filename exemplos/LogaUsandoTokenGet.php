<?php

include '../include/functions.php';




/* LOGA USANDO TOKEN DE ACESSO*/

$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
		"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2NydWQyXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2NydWQyXC8iLCJpYXQiOjE2NjA3NzIwODIsImV4cCI6MTY2MDc3NTY4MiwiZGF0YSI6eyJ1c2VyX2lkIjoiMTEifX0.I9fMCGtx1La0Gy9fjss5jEfaL_5kriu4obMdrZ3Uubo",
	);
				
	$data = array(
		
	);			

$get_data = callAPI('GET', 'http://localhost/crud2/getUser.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($response);

