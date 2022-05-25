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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>