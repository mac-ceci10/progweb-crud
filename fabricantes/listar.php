<?php
require "../includes/funcoes-fabricantes.php";
$listaFabricantes = lerFabricantes($conexao);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | SELECT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Fabricantes | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>
      

<div class="container">
    
    <h2>Lendo e carregando todos os fabricantes</h2>
    <p><a href="inserir.php">Inserir</a></p>    



    <!-- Cabeçalho -->
    <table>
        <caption> Lista de Fabricantes </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Operação</th>
            </tr>
        </thead>
               


        <tbody>

        <?php foreach ($listaFabricantes as $fabricante){ ?>

            <tr>
                <td><?=$fabricante["id"]?></td>
                <td><?=$fabricante["nome"]?></td>
                <td> 
                    <a href="atualizar.php">Atualizar</a> - <a href="excluir.php">Excluir</a> 
                </td>
            </tr>

        <?php } 
        require "../includes/desconecta.php"; //opicional
        ?>

        </tbody>

    </table>
 
</div>



</body>
</html>