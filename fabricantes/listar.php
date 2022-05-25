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
<!-- <link href="../css/style.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container">
    <h1>Fabricantes | SELECT -
    <a class="btn btn-warning" href="../index.php">Home</a> </h1>
</div>
      

<div class="container">
    
    <h2>Lendo e carregando todos os fabricantes</h2>
    <p><a class="btn btn-warning" href="inserir.php">Inserir</a></p>    

    <table class="table table-striped">
        <caption> Lista de Fabricantes </caption>
        <thead class="thead-dark">
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
<a class="btn btn-success" href="atualizar.php?id=<?=$fabricante["id"]?>">Atualizar</a> 
- <a class="btn btn-danger" href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>


</html>