<?php

$servername = "localhost"; // SERVIDOR DO BANCO DE DADOS, SE FOR LOCAL É localhost OU IP DA MÁQUINA 127.0.0.1
$username = "root"; // USUÀRIO DO BANCO DE DADOS> SE FOR LOCAL GERALMENTE É root
$password = ""; 	// SENHA DO BANCO DE DADOS. SE FOR LOCAL GERALMENTE É VAZIO
$dbname = "crud2";	// NOME DO BANDO DE DADOS

// CRIA A CONEXÃO COM O BANCO DE DADOS
$con = new mysqli($servername, $username, $password, $dbname);
// CHECA SE A CONEXÃO FOI BEM SUSSEDIDA. 
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error); // SE TIVER FALHA ELE RETORNA O ERRO
}

// FUNÇÃO PARA FAZER AS CHAMADAS NA API
function callAPI($method, $url, $data, $headers){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);// ok
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//ok
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_ENCODING, '');
	curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
	curl_setopt($curl, CURLOPT_SSLVERSION, 6);
   curl_setopt($curl, CURLOPT_HTTPHEADER,  $headers);
   
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}

// FUNÇÃO PARA FAZER A EXIBIÇÃO DOS ITENS
function read($id){	
	global $con;
	
	if($id) {
			$sql = "SELECT * FROM items WHERE id='$id'";
			
	} else {
			$sql = "SELECT * FROM items";		
	}
	
		$result = $con->query($sql);
		
			
			return $result;
	}
	
	
// FUNÇÃO PARA CRIAR ITENS 
function create($name, $description, $price, $category_id, $created){
		global $con;
		$name = htmlspecialchars(strip_tags($name));
		$description = htmlspecialchars(strip_tags($description));
		$price = htmlspecialchars(strip_tags($price));
		$category_id = htmlspecialchars(strip_tags($category_id));
		$created = htmlspecialchars(strip_tags($created));
		
		$sql = "INSERT INTO items (
			`name`, 
			`description`, 
			`price`, 
			`category_id`, 
			`created`
			) VALUES (
			'$name', 
			'$description', 
			'$price',
			'$category_id',
			'$created'
		)";
		
		if ($con->query($sql) === TRUE) {
		  return true;
		} 
		  return false;	
		
				 
	}
		
		
// FUNÇÃO PARA ATUALIZAR ITENS	
function update($name, $description, $price, $category_id, $created, $id){
		global $con;
		
		
	 
		$id = htmlspecialchars(strip_tags($id));
		$name = htmlspecialchars(strip_tags($name));
		$description = htmlspecialchars(strip_tags($description));
		$price = htmlspecialchars(strip_tags($price));
		$category_id = htmlspecialchars(strip_tags($category_id));
		$created = htmlspecialchars(strip_tags($created));
	 
		$sql = "UPDATE items SET name= '$name', description = '$description', price = '$price', category_id = '$category_id', created = '$created'
			WHERE id = '$id'";

			if ($con->query($sql) === TRUE) {
			  return true;
			} 

		return false;
	}
	
// FUNÇÃO PARA DELETAR ITENS PEGANDO O ID
function delete($id){
		global $con;

		$id = htmlspecialchars(strip_tags($id));
		// sql to delete a record
		$sql = "DELETE FROM items WHERE id='$id'";
		if(mysqli_query($con, $sql)){
		  return true;
		} else{
		  return false;
		}

	}