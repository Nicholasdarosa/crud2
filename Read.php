<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
require __DIR__ . '/include/functions.php';

$data = json_decode(file_get_contents("php://input"));

$id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0'; // VERIFICA SE TEM ID NO PARAMETRO GET, SE NÃO TIVER ELE COLOCA VALOR ZERO

$result = read($id); // ACIONA A FUNÇÃO REAR DENTRO DO ARQUIVO functions.php usando o ID recebido via GET
//print_r($result);

if($result->num_rows > 0){    // VERIFICA SE TEM MAIS DE 1 RESULTADO
    $itemRecords=array(); // CRIA UMA ARRAY PARA SETAR VALORES A ELA
    $itemRecords["items"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($item);  // EXTRAI VALORES DA ARRAY
        $itemDetails=array(
            "id" => $id,
            "name" => $name,
            "description" => $description,
			"price" => $price,
            "category_id" => $category_id,            
			"created" => $created,
            "modified" => $modified			
        ); 
       array_push($itemRecords["items"], $itemDetails);
    }    
    http_response_code(200);     
    echo json_encode($itemRecords); // JSON ENCODE TRANSFORMA UMA ARRAY PHP EM  JSON json_decode FAZ O CONTRÁRIO
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "Item não encontrado.")
    );
} 
?>