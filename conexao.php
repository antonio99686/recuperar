<?php
function conectar()
{
    $conexao = mysqli_connect("localhost", "root", "", "recuperar");
    if ($conexao === false) {
        echo "Erro ao conectar á base dados.N° do erro" .
            mysqli_connect_errno() . "." .
            mysqli_connect_error();
        exit;
    }
    return $conexao;
}


function executarSQL($conexao, $sql){
    $result = mysqli_query($conexao, $sql);
    if ($result === false) {
        echo "Erro ao executar o comando SQL." .
            mysqli_errno($conexao) . ":". mysqli_error($conexao);
}
return $result;
}
?>