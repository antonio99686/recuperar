<?php
// Carregando o PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once "conexao.php";
$conexao = conectar();
$email = $_POST['email'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = executarSQL($conexao, $sql);

$row = mysqli_fetch_assoc($result);
if($row == null){
    echo"Email não cadastrado! Faça o cadastro e 
    em seguida realize o login.";
    die();
}
//gerar um token unico
$token = bin2hex(random_bytes(50));


// Incluindo os arquivos necessários do PHPMailer
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true); // Habilita exceções

try {
    // Configuração do servidor SMTP local
    $mail->CharSet= 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->setLanguage('br');
    $mail->SMTPDebug = SMTP:: DEBUG_OFF;
    $mail->SMTPDebug = SMTP:: DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = '';  // Endereço do servidor SMTP local
    $mail->SMTPAuth = true;    // Autenticação desativada se não for necessária
    $mail->Username = 'antonio.2022324018@aluno.iffar.edu.br'; 
    $mail->Password = 'm1ch@3l1S'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;           // Porta padrão para SMTP


   
} catch(Exception $e){
    echo"Não foi possivel enviar o email mailer Error: {$mail->ErrorInfo}";
}
 
?>