<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['user']));
$senha = mysqli_real_escape_string($conexao,trim($_POST['pass']));
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
 
$sql = "SELECT COUNT(*)AS total FROM users WHERE usuario = '$usuario' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row["total"] == 1) {
    $_SESSION['erro_cadastro'] = true;
    $conexao->close();
    header("Location: cadastro.php");
    exit();
}
// Se o usuário não existe, faz o cadastro
$sql_in = "INSERT INTO users(nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha_hash', NOW())";
if ($conexao->query($sql_in)===TRUE) {
    $_SESSION["status_cadastro"] = true;
}    
    $conexao->close();
    header("Location: cadastro.php");
    exit(); // Interrompe a execução após o redirecionamento
?>