<script>
        Swal.fire({
            icon: 'success',
            title: 'Email enviado!',
            text: 'Confira o seu email para recuperar o acesso à sua conta.',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php'; // redireciona para a página de login
            }
        });
    </script>