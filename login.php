<?php
require_once "conexao.php";
$conexao = conectar();


$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = executarSQL($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row === null) {
    echo "Email não existe no sistema!!!
    Por, Favor realize o cadastro no sistema.";
    die();
}
if ($senha === $row['senha']){
    header("location:dashboard.php");

}else {
    echo"Senha invalida! Tente novamente";
}

?>