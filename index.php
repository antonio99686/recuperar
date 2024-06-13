<?php
sleep(1);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.16/jquery.inputmask.min.js"></script>
    <title>LOGIN</title>
</head>

<body>

    <div class="container" id="container">

        <div class="form-container sign-in">
            <form action="login.php" method="POST">
            <div class="social-icons">
                    <img src="img/sonic.gif" alt="SONIC" height="160px" width="120px">
                </div>
                <h1>LOGIN</h1>
                <input type="email" name="email" placeholder="Digite seu Email" required>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
              
                <button type="submit">Entrar</button>
            </form>
            <a href="form_cadastro.php">Cadastrar</a>
            <br>
            <a href="form_recuperar.php">Recuperar</a>
        </div>
        
    </div>


</body>

</html>
