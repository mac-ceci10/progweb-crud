<?php
// funcoes-produto.php

require "conecta.php";

function lerProdutos($conexao){
    // 1) Montar a string do comando SQL
    $sql = "SELECT id, nome FROM produtos";

    // 2) Executar o comando
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // 3) Criar um array vazio para receber os resultados
    $produtos = [];  // ARRAYZÃO

    // 4) Loop iterando em cada resultado, e a cada fabricante que for localizado, ele é acrescentado ao array fabricantes.
    while( $produto = mysqli_fetch_assoc($resultado) ){
        // array_push(nome do array principal, nome do array individual)
        array_push($produtos, $produto);
        //destino de onde você quer colocar, e depois é que vem cada informação buscada produto.
    }

    // 5) Retornando para fora da função os fabricantes localizados
    return $produtos; // Lista de fabricantes (Matriz)
}

//var_dump(lerProdutos($conexao)); // teste


function inseriProduto($conexao, $nome){
    $sql = "INSERT INTO fabricantes(nome) VALUES('$nome')";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerUmFabricante($conexao, $id){
    // Montagem do comando SQL com o parâmetro id
    $sql = "SELECT id, nome FROM fabricantes WHERE id = $id";
    
    // Execução do comando e armazenamento do resultado
    $resultado = mysqli_query($conexao, $sql) 
                or die(mysqli_error($conexao));

    // Retornando para fora da função o resultado como array assoc.
    return mysqli_fetch_assoc($resultado);
} // final lerUmFabricante




function atualizarFabricante($conexao, $id, $nome){
    $sql = "UPDATE fabricantes SET nome = '$nome' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // final atualizarFabricante


function excluirFabricante($conexao, $id) {
    $sql = "DELETE FROM fabricantes WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}





