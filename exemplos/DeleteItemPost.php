<?php

include '../include/functions.php';



//DELETE
	$header = array(
		"cache-control: no-cache",
		"content-type: application/json",
	);
	$data = array(
		"id" => '21',
	);			

$get_data = callAPI('POST', 'http://localhost/crud2/Delete.php',  $data, $header);
$response = json_decode($get_data);

print_r($get_data);
/**/
