<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <img class='logo_index' src="imagens\logo.svg" alt="logotipo">
            <h1 class="logo_name">PET PET</h1>
        </div>
        <div class="right">
            <div class="login_form">
                <h1>BEM VINDO!</h1>
                <?php  
                    if (isset($_SESSION['status_cadastro'])): 
                ?>
                <div class="notification">
                    <p>Cadastro Efetuado!</p>
                    <p>Faça login informando o seu usuário e senha <a href="index.php">aqui</a></p>
                </div>
                <?php 
                    endif;
                    unset($_SESSION['status_cadastro']);
                ?>
                <?php  
                    if (isset($_SESSION['erro_cadastro'])): 
                ?>
                <div class="notification">
                    <p>Cadastro Já Existe!</p>
                    <p>Faça login informando o seu usuário e senha <a href="index.php">aqui</a></p>
                </div>
                <?php 
                    endif;
                    unset($_SESSION['erro_cadastro']);
                ?>
                <form action="cadastrar.php" method="POST">
                    <input type="text" name="name" placeholder="Nome">
                    <input type="text" name="user" placeholder="Usuário">
                    <input type="password" name="pass" placeholder="Senha">
                    <input type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php
    if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];
    if ($erro == 'usuario_ja_existe') {
        echo "<script>alert('Usuário já cadastrado');</script>";
    }
}
?>