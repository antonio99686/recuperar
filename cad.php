<?php
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//cadastra no bancon 
$sql = "INSERT INTO usuarios(nome,email,senha) 
 VALUES ('$nome','$email','$senha')";
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Falha ao enviar arquivo.";
}
header('location: index.php');



?>