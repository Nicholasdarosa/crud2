<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require __DIR__ . '/include/functions.php';
 

$data = json_decode(file_get_contents("php://input"));



if(!empty($data->name) && !empty($data->description) &&
!empty($data->price) && !empty($data->category_id)){   
 

    $name = $data->name;
    $description = $data->description;
    $price = $data->price;
    $category_id = $data->category_id;	
    $created = date('Y-m-d H:i:s'); 
    
    if(create($name, $description, $price, $category_id, $created)){         
        http_response_code(201);         
        echo json_encode(array("message" => "O item foi criado."));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Erro ao criar item."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Erro ao criar item. Dados incompletos."));
}
?>