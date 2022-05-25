<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | INSERT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Fabricantes | INSERT -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    		
    <h2>Utilize o formulário abaixo para cadastrar um fabricante.</h2>    
    
	<form action="" method="post">
	    <p>
            <label for="nome">Nome:</label><br>
	        <input type="text" name="nome" id="nome" required>
        </p>	    
        <button name="inserir">Inserir fabricante</button>
	</form>	

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>