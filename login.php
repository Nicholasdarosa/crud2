<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__.'/include/Database.php';
require __DIR__.'/include/JwtHandler.php';

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
}

$db_connection = new Database();
$conn = $db_connection->dbConnection();

$data = json_decode(file_get_contents("php://input"));
$returnData = [];

// SE O MÉTODO DE SOLICITAÇÃO NÃO FOR IGUAL A POST
if($_SERVER["REQUEST_METHOD"] != "POST"):
    $returnData = msg(0,404,'Página não encontrada!');

// VERIFICANDO CAMPOS VAZIOS
elseif(!isset($data->email) 
    || !isset($data->password)
    || empty(trim($data->email))
    || empty(trim($data->password))
    ):

    $fields = ['fields' => ['email','password']];
    $returnData = msg(0,422,'Por favor, preencha todos os campos requisitados!',$fields);

// SE NÃO HÁ CAMPOS VAZIOS ENTÃO
else:
    $email = trim($data->email);
    $password = trim($data->password);

    // VERIFICANDO O FORMATO DO E-MAIL (SE FORMATO INVÁLIDO)
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $returnData = msg(0,422,'Endereço de email inválido!');
    
    // SE A SENHA FOR INFERIOR A 8 MOSTRA O ERRO
    elseif(strlen($password) < 8):
        $returnData = msg(0,422,'Sua senha deve ter pelo menos 8 caracteres!');

    // O USUÁRIO PODE REALIZAR A AÇÃO DE LOGIN
    else:
        try{
            
            $fetch_user_by_email = "SELECT * FROM `users` WHERE `email`=:email";
            $query_stmt = $conn->prepare($fetch_user_by_email);
            $query_stmt->bindValue(':email', $email,PDO::PARAM_STR);
            $query_stmt->execute();

            // SE O USUARIO FOR ENCONTRADO
            if($query_stmt->rowCount()):
                $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
                $check_password = password_verify($password, $row['password']);

                // VERIFICANDO A SENHA (ESTÁ CORRETA OU NÃO?)
                // SE A SENHA ESTIVER CORRETA, ENVIE O TOKEN DE LOGIN
                if($check_password):

                    $jwt = new JwtHandler();
                    $token = $jwt->jwtEncodeData(
                        'http://localhost/crud2/',
                        array("user_id"=> $row['id'])
                    );
                    
                    $returnData = [
                        'success' => 1,
                        'message' => 'Você fez login com sucesso.',
                        'token' => $token
                    ];

                //SE SENHA INVÁLIDA
                else:
                    $returnData = msg(0,422,'Senha inválida!');
                endif;

            // SE O USUÁRIO NÃO FOR ENCONTRADO POR E-MAIL MOSTRE O SEGUINTE ERRO
            else:
                $returnData = msg(0,422,'Email inválido!');
            endif;
        }
        catch(PDOException $e){
            $returnData = msg(0,500,$e->getMessage());
        }

    endif;

endif;

echo json_encode($returnData);