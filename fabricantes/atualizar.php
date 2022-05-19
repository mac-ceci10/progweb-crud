<?php
require '../includes/funcoes-fabricantes.php';

// Capturar o parâmetro id da URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Chamamos a função que irá retornar os dados de UM FABRICANTE
$dados = lerUmFabricante($conexao, $id);


// Detectando o acionamento do botão atualizar
if( isset($_POST['atualizar']) ){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarFabricante($conexao, $id, $nome);
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | UPDATE - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Fabricantes | SELECT e UPDATE -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">

    <h2>Utilize o formulário abaixo para atualizar os dados de um fabricante.</h2>

    <form action="" method="post" class="w-50 mx-auto">

	    <p>
            <label for="nome">Nome:</label><br>
	        <input value="<?=$dados['nome']?>" type="text" name="nome" id="nome" required>
        </p>   
        <button name="atualizar">Atualizar fabricante</button>
	</form>	

</div>

</body>
</html>