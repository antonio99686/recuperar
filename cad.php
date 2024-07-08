<?php
require_once "conexao.php";
$conexao = conectarr();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//cadastra no bancon 
$sql = "INSERT INTO usuarios(nome,email,senha) 
 VALUES ('$nome','$email','$senha')";
$result = mysqli_query($conexao, $sql);
if ($result === false) {
   if(mysqli_errno($conexao) == 1062){
    echo"Email ja cadastrado no Sistema!!!
    Tente fazer o login ou faça a recuperação";  
   die();
}else{
   echo "Erro ao inserir o novo usuário" .
      mysqli_errno($conexao) . ":" . mysqli_error($conexao);
   die();

}
}
header('location:index.php')

   ?>