<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    if (isset($_SESSION['senha_incorreta'])): 
                ?>
                <div class="notification">
                    <p>Senha Incorreta</p>
                    <p>Tente Novamente</p>
                </div>
                <?php 
                    endif;
                    unset($_SESSION['senha_incorreta']);
                ?>
                <?php  
                    if (isset($_SESSION['user_nao_encontrado'])): 
                ?>
                <div class="notification">
                    <p>Usuário não Encontrado</p>
                    <a href="cadastro.php">Cadastre-se aqui</a>
                </div>
                <?php 
                    endif;
                    unset($_SESSION['user_nao_encontrado']);
                ?><?php  
                    if (isset($_SESSION['campos_vazios'])): 
                ?>
                <div class="notification">
                    <p>Por Favor, preencha todos os campos!</p>
                </div>
                <?php 
                    endif;
                    unset($_SESSION['campos_vazios']);
                ?>
                <form action="login.php" method="POST">
                    <input type="text" name="user" placeholder="Usuário">
                    <input type="password" name="pass" placeholder="Senha">
                    <input type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>

</body>
</html>
