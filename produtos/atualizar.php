<?php
require "../includes/funcoes-fabricantes.php";
require "../includes/funcoes-produtos.php";

$listaDeFabricantes = lerFabricantes($conexao);

// Capturar o parâmetro id da URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// Chamamos a função que irá retornar os dados de UM FABRICANTE
$produto = lerUmProduto($conexao, $id);


if( isset($_POST['atualizar']) ){
    $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS );
    $preco = filter_input(INPUT_POST,'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = filter_input(INPUT_POST,'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_SPECIAL_CHARS );
    $fabricanteId = filter_input(INPUT_POST,'fabricante', FILTER_SANITIZE_NUMBER_INT);


    atualizarProduto($conexao, $id, $nome, $preco, $descricao, $quantidade, $fabricanteId);
    header("location:listar.php"); // redirecionamento
    }


    // $number = $preco;
    // //$number = 1234.56;
    // // let's print the international format for the en_US locale
    // setlocale(LC_MONETARY, 'pt-BR');
    // echo money_format('%i', $number). "\n";
    // // USD 1,234.56
    


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | UPDATE - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | SELECT e UPDATE -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    <h2>Utilize o formulário abaixo para atualizar os dados de um produto.</h2>
    
    <form action="" method="post"> 
        
        <p><label for="nome">Nome:</label>
	    <input value="<?=$produto['nome']?>"  type="text" name="nome" id="nome" required></p>

        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>

            <option value=""></option>

            <!-- Obs: Nesta parte estamos resgatando os dados da tabela FABRICANTES para se completar as informações do formulário de produtos. -->
            <?php 
                foreach ($listaDeFabricantes as $fabri) { ?>
                <option 
                
                <?php 
                
                if($produto['fabricante_id'] == $fabri['id']){

                    echo " selected";
                }
               ?>                           
                    value="<?=$fabri['id']?>">
                    
                    <?=$fabri['nome']?>
                
                </option>
             <?php }  ?>

            </select>
        </p>


        <p><label for="preco">Preço:</label>
	    <input value="<?=$produto['preco']?>" type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required></p>

        <p><label for="quantidade">Quantidade:</label>
	    <input  value="<?=$produto['quantidade']?>"  type="number" name="quantidade" id="quantidade" min="0" max="50" step="1" required></p>
        
	    <p><label for="descricao">Descrição:</label> <br>
	    <textarea  name="descricao" id="descricao" rows="3" cols="40" maxlength="1000" required>
        <?=$produto['descricao']?>"
        </textarea>
        </p>
	    
        <button name="atualizar">Atualizar produto</button>
	</form>	   
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


</body>
</html>