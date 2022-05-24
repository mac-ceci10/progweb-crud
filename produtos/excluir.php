<?php
require '../includes/funcoes-produtos.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
excluirProduto($conexao, $id);

//header - redirecionamento da página.
header("location:listar.php");