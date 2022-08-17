<?php

include '../include/functions.php';




//UPDATE
	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
		$data = array(
		"name" => 'Pulseira tecnologica',
		"description" => 'Artigo de beleza',
		"price" => '90',
		"category_id" => '25',
		"id" => '22'
	);		

$get_data = callAPI('POST', 'http://localhost/crud2/Update.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($get_data);

