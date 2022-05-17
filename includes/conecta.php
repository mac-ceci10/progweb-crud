<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas_marcia";

//parâmetros do servidor para acesso ao banco de dados
//conectando ao servidor

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//habilitar o suporte ao utf8
mysqli_set_charset($conexao, "utf8");

/* Teste (provisório) */
// if ($conexao){
//     echo "Tudo ok!";
// }