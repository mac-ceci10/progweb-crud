<?php
/* Se o botão inserir do formulário for acionado
(ou seja, ele passará a estar definido ou existir) */

require "../includes/funcoes-fabricantes.php";
require "../includes/funcoes-produtos.php";

$listaDeFabricantes = lerFabricantes($conexao);

if( isset($_POST['inserir']) ){
    $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS );
    $preco = filter_input(INPUT_POST,'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = filter_input(INPUT_POST,'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_SPECIAL_CHARS );
    $fabricanteId = filter_input(INPUT_POST,'fabricante', FILTER_SANITIZE_NUMBER_INT);

inserirProduto ($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId);
header("location:listar.php"); // redirecionamento
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | INSERT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | INSERT -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    
    <h2>Utilize o formulário abaixo para cadastrar um produto.</h2>    		
    
	<form action="" method="post">
	    <p>
            <label for="nome">Nome:</label>
	        <input type="text" name="nome" id="nome" required>
        </p>

        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>

            <option value=""></option>
            <!-- Obs: Nesta parte estamos resgatando os dados da tabela FABRICANTES para se completar as informações do formulário de produtos. -->
            <?php 
            foreach ($listaDeFabricantes as $fabri) { ?>
                <option value="<?=$fabri['id']?>"> <?=$fabri['nome']?></option>

             <?php }  ?>

            </select>
        </p>

        <p>
            <label for="preco">Preço:</label>
	        <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
	        <input type="number" name="quantidade" id="quantidade" min="0" max="50" step="1" required>
        </p>

	    <p>
            <label for="descricao">Descrição:</label> <br>
	        <textarea name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required></textarea>
        </p>
	    
        <button name="inserir">Inserir produto</button>
	</form>	
</div>

</body>
</html>