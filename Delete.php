<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require __DIR__ . '/include/functions.php'; // INCLUI AS FUNCÇÕES

$data = json_decode(file_get_contents("php://input"));



if(!empty($data->id)) {
	$id = $data->id;
	if(delete($id)){    
		http_response_code(200); 
		echo json_encode(array("message" => "Item deletado."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Erro ao deletar item."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Erro ao deletar item. Dados imcompletos."));
}
?>