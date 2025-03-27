<?php
include("conexao.php");
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conexao, $sql);
    $user = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conexao, trim($_POST["name"]));
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['user']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['pass']));
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql_update = "UPDATE users SET nome='$nome', usuario='$usuario', senha='$senha_hash' WHERE id=$id";
    if ($conexao->query($sql_update) === TRUE) {
        $_SESSION["status_update"] = true;
        header("Location: painel.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $user['nome']; ?>" required>
        <br>
        <label for="user">Usuário:</label>
        <input type="text" name="user" value="<?php echo $user['usuario']; ?>" required>
        <br>
        <label for="pass">Senha:</label>
        <input type="password" name="pass" required>
        <br>
        <button type="submit">Atualizar</button>
    </form>
    <a href="painel.php">Voltar</a>
</body>
</html>
