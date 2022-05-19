<?php
require "../includes/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
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

    <table>
        <caption> Lista de Fabricantes </caption>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Operação</th>
            </tr>
        </thead>
                
        <tbody>

<?php 
$contador = 1;
foreach( $listaDeFabricantes as $fabricante ){ ?>        
            <tr>
                <td> <?=$contador.": ". $fabricante["nome"]?> </td>
                <td> 
<a href="atualizar.php?id=<?=$fabricante["id"]?>">Atualizar</a> 
- <a href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a>
                </td>
            </tr> 
<?php 
$contador++;
} 

require "../includes/desconecta.php"; // opcional
?>

        </tbody>

    </table>
 
</div>



</body>
</html>