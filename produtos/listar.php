<?php
require '../includes/funcoes-produtos.php';
$listaDeProdutos = lerProdutos($conexao);
// var_dump($listaDeProdutos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | SELECT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    
    <h2>Lendo e carregando todos os produtos</h2>
    <p><a href="inserir.php">Inserir</a></p>  
    <hr>

    <?php foreach ($listaDeProdutos as $produto) {?>

    <ul>
        <li><b>Nome:</b> <?=$produto['nome']?></li>
        <li><b>Preço:</b> <?=$produto['preco']?> </li>
        <li><b>Quantidade:</b><?=$produto['quantidade']?> </li>
        <li><b>Descrição:</b> <?=$produto['descricao']?> </li>
        <li><b>Fabricante:</b><?=$produto['fabricante_id']?> </li>
    </ul>

    <?php }?>

</div>


</body>
</html>