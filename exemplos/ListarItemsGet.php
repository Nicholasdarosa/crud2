<?php

include '../include/functions.php';




//GET
	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
	$data = array(
		"id" => '',
	);			

$get_data = callAPI('GET', 'http://localhost/crud2/Read.php',  $data, $header);
$response = json_decode($get_data, true);

print_r($get_data);