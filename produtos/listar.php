<?php
require '../includes/funcoes-produtos.php';
$listaDeProdutos = lerProduto($conexao);
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
        <li><b>Nome:</b><?=$produto['produto']?></li>
    <!-- antes era nome e agora é produto -->
        <li><b>Preço:</b><?=formataMoeda($produto['preco'])?> </li>
        <li><b>Quantidade:</b><?=$produto['quantidade']?> </li>
        <li><b>Descrição:</b> <?=$produto['descricao']?> </li>
        <li><b>Fabricante:</b><?=$produto['fabricante']?> </li>
    <!-- antes era fabricante_id e agora é fabricante -->
    </ul>

    <a href="atualizar.php?id=<?=$produto['id']?>">Atualizar</a>
    <a href="excluir.php?id=<?=$produto['id']?>">Excluir</a>

    <?php }?>

</div>


</body>
</html>