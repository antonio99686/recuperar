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

$usuario = mysqli_fetch_assoc($result);
if ($usuario == null) {
    echo "Email não cadastrado! Faça o cadastro e 
    em seguida realize o login.";
    die();
}
//gerar um token unico
$token = bin2hex(random_bytes(50));


// Incluindo os arquivos necessários do PHPMailer
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
include 'config.php';
$mail = new PHPMailer(true); // Habilita exceções

try {
    // Configuração do servidor SMTP local
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->setLanguage('br');
    // $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Endereço do servidor SMTP local
    $mail->SMTPAuth = true;    // Autenticação desativada se não for necessária
    $mail->Username = $config['email'];
    $mail->Password = $config['senha_email'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;           // Porta padrão para SMTP
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false, 
        'verifi_self_signed' => true
    )

);



    $mail->setFrom($config['email'], "aula de Topicos");
    $mail->addAddress($usuario['email'], $usuario['nome']);
    $mail->addReplyTo($config['email'], "aula de Topicos");

    $mail->isHTML(true);
    $mail->Subject = "Recuperação de senha do sistema";
    $mail->Body = 'olá <br>
    Você solicitou a recuperação de senha da sua conta ao nosso sistema.
    Para isso, clique no link abaixo para realizar a troca de senha:<br>
    <a href="' . $_SERVER['SERVER_NAME'] . '/nova_senha.php?email=' . $usuario['email'] .
        '&token=' . $token . '"> Clique aqui para recuperar o acesso á sua conta!</a><br>';

    $mail->send();
    echo "Email enviado com sucesso! <br> Confira o seu Email.";


} catch (Exception $e) {
    echo "Não foi possivel enviar o email mailer Error: {$mail->ErrorInfo}";
}

?>