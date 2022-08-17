<?php

include '../include/functions.php';




// CREATE  CRIA UM ITEM
	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
	
	$data = array(
		"name" => 'Notebook Asus',
		"description" => 'Note barato',
		"price" => '50',
		"category_id" => '9',
		"created" => '17-08-2022'
	);
	
				

$get_data = callAPI('POST', 'http://localhost/crud2/Create.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($get_data);
