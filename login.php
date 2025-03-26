<?php
include('conexao.php');

// Iniciar a sessão no início do script
session_start();

// Verificando se os campos de login foram preenchidos
if (empty($_POST['user']) || empty($_POST['pass'])) {
    $_SESSION['campos_vazios'] = true;// Usando header para redirecionamento sem depender do JavaScript
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['user']);
$senha = $_POST['pass'];

// Query para buscar o usuário e senha
$query = "SELECT id, usuario, senha FROM users WHERE usuario = '{$usuario}'";
$result = mysqli_query($conexao, $query);

// Verificando se o usuário existe
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Verificando a senha usando password_verify
    if (password_verify($senha, $row['senha'])) {
        // Senha correta
        $_SESSION['usuario'] = $usuario;
        $_SESSION['autenticado'] = true;
        header('Location: painel.php');
        exit();
    } else {
        // Senha incorreta
        $_SESSION['senha_incorreta'] = true;
        header('Location: index.php');
        exit();
    }
} else {
    // Usuário não encontrado
    $_SESSION['user_nao_encontrado'] = true;
    header('Location: index.php');
    exit();
}
?>
