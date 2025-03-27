<?php
include("conexao.php");
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql_delete = "DELETE FROM users WHERE id = $id";
    if ($conexao->query($sql_delete) === TRUE) {
        $_SESSION["status_delete"] = true;
        header("Location: painel.php");
        exit();
    }
}
?>
