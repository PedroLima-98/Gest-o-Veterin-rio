<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h1>BEM-VINDO!</h1>
        <form action="login.php" method="POST">
            <input type="text" name="user" placeholder="Usuário">
            <input type="password" name="pass" placeholder="Senha">
            <input type="submit" value="Entrar">
        </form>
    </div>
    <?php
    if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];
    if ($erro == 'campos_vazios') {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
    } elseif ($erro == 'senha_incorreta') {
        echo "<script>alert('Senha incorreta!');</script>";
    } elseif ($erro == 'usuario_nao_encontrado') {
        echo "<script>alert('Usuário não encontrado!');</script>";
    }
}
?>

</body>
</html>