<?php
include("verifica_login.php");
?>
<body style='background-color: #65A8C2'>
    
<h2>Olá, <?php echo $_SESSION['usuario'];?></h2>
<table style='display:block; margin:0 auto; text-align:center; justify-items:center'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("conexao.php");
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conexao, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['usuario'] . "</td>";
            echo "<td>
                    <a href='edit_user.php?id=" . $row['id'] . "'>Editar</a>
                    <a href='delete_user.php?id=" . $row['id'] . "'>Deletar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<h2><a href="logout.php">Sair</a></h2>

</body>