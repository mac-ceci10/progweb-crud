<?php
//funcoes-fabricantes.php
// requere do contecta.php - as funções serão dependentes da conexão

require "conecta.php";

function lerFabricantes($conexao) {
    // 1) Montar a string do comando SQL
    $sql = "SELECT id, nome FROM fabricante";

    // 2) Executar o comando
    $resultado = mysqli_query($conexao, $sql)
    or die(mysqli_error($conexao));

    // or die(mysqli_error($conexao)); , esta instrução é para forçar o PHP a informar o que está errado.

    //3) Criar um array vazio para receber os resultados
    $fabricantes = []; 
    //guarda na memória tudo o que encontrou
    
    // ARRAYZÃO
    //4) Loop iterando em cada resultado, e a cada fabricante localizado, ele é acrescentado ao array fabricantes.

        while($fabricante = mysqli_fetch_assoc($resultado)) {
        array_push($fabricantes, $fabricante);
    }

    // 5) Retornando para fora da função os fabricantes localizados
    return $fabricantes; // Lista de fabricantes (Matriz)
}

// var_dump(lerFabricantes($conexao)); // teste


//função inserir fabricante

function inserirFabricante($conexao, $nome){
    $sql = "INSERT INTO fabricantes(nome) VALUES ('$nome')";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
}

