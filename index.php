<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="C:\xampp\htdocs\Vet\css\reset.css">
    <!-- <link rel="stylesheet" href="C:\xampp\htdocs\Vet\css\index.css"> -->
    <style>

html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
embed,
figure,
figcaption,
footer,
header,
hgroup,
menu,
nav,
output,
ruby,
section,
summary,
time,
mark,
audio,
video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}

/* HTML5 display-role reset for older browsers */
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
    display: block;
}

body {
    line-height: 1;
}

ol,
ul {
    list-style: none;
}

blockquote,
q {
    quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
    content: '';
    content: none;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
}
        body,
html {
    margin: 0;
    height: 100%;
}

/* Criando o grid */
.container {
    display: grid;
    grid-template-columns: 50% 50%;
    /* Duas colunas de 50% cada */
    height: 100%;
    /* 100% da altura da tela */
}

/* Estilos para a primeira coluna (lado esquerdo) */
.left {
    background-color: #65A8C2;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;

}

.logo_name {
    font-size: 3.5em;
    text-align: center;
}

.logo_index {
    width: 16rem;
    /* Ajuste o tamanho conforme necessário */
    height: auto;
    margin-bottom: 20px;
    /* Espaçamento entre a imagem e o título */
}


/* Estilos para a segunda coluna (lado direito) */
.right {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ECF3F4;
}

.login_form {
    background-color: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 50%;
    text-align: center;
    justify-content: center;
    justify-items: center;
}

.login_form h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    /* Espaço entre o título e o formulário */
}

.login_form input {
    width: 90%;
    padding: 20px;
    margin: 10px 0;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.login_form input[type="submit"] {
    background-color: #3498db;
    border: none;
    color: white;
    cursor: pointer;
}

.login_form input[type="submit"]:hover {
    background-color: #2980b9;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img class='logo_index' src="logo.svg" alt="logotipo">
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
