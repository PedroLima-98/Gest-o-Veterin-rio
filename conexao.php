<?php
define ('HOST','127.0.0.1');
define('USUARIO','root');
define('SENHA','VoucherDev@2024');
define('DB','petpet_db');


$conexao = new mysqli(HOST,USUARIO,SENHA,DB) or die ('Não foi possivel conectar');
?>