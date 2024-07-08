<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/gmail.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.all.min.js"></script>

    <title>Recuperar Senha</title>
</head>

<body>

</body>

</html>
<?php

$email = $_GET['email'];
$token = $_GET['token'];
require_once "conexao.php";
$conexao =  conectar();

$sql = "SELECT * FROM recuperer_senha WHERE email ='$email' AND token ='$token'";
$result = executarSQL($conexao,$sql);

$recuperar = mysqli_fetch_assoc($result);

if ($recuperar == null) {
    echo "Email ou token incorreto. Tente fazer um novo pedido 
    de recuperação de senha";
    die();
}else {
    //verefica a validade do pedido (data_criacao)
    // verefica se o link jah foi usuado 
    date_default_timezone_set('America/Sao_paulo');
    $agora = new DateTime('now');
    $data_criacao =  DateTime::createFromFormat('Y-m-d H:i:s',
    $recuperar['data_criacao']);

    $Umdia = DateInterval::createFromDateString('1 day');
    $dataExpiracao = date_add($data_criacao,$Umdia);


    if($agora < $dataExpiracao){
        echo"funcionou";
    }
    
}