<?php
// funcoes-produto.php
require "conecta.php";

function lerProduto($conexao){


                // 1) Montar a string do comando SQL

    // $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos ORDER BY nome";

                // ORDER BY - ordem crescente - O ORDER BY normalmente efetua a ordenação em ordem crescente 
                // 2) Executar o comando


    $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.quantidade, produtos.preco, produtos.descricao, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes
    ON produtos.fabricante_id = fabricantes.id ORDER BY produto";

    // após o ON é a descrição da chave estrangeira
    // é possível testar este comando SQL no PHP Myadimin
    // Observação na aula, faltou uma letra "S" na descrição do código, e houve que o SQL lido pelo PHP MYadmin, funcionou, corrigiu...
        //Já na página PHP acusou o erro. O professor ajudou a identificá-lo, e corrigí-lo.

    // Colocar o AS para não ter que ficar repetindo. 
    // esta estratégia é porque iremos usar um ARRAY em breve e ficará muito extenso escrever, então colocando um apelido, o código fica mais limpo.

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




function inserirProduto($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId){
    //em cima a gente cria os nomes
    $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES('$nome', $preco, $quantidade, '$descricao', $fabricanteId)";
    //na descrição do comando, oberva-se que as variáveis com textos estão com aspas, as numéricas não.
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}





function lerUmProduto($conexao, $id){
    // Montagem do comando SQL com o parâmetro id
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos WHERE id = $id";
    
    // Execução do comando e armazenamento do resultado
    $resultado = mysqli_query($conexao, $sql) 
                or die(mysqli_error($conexao));

    // Retornando para fora da função o resultado como array assoc.
    return mysqli_fetch_assoc($resultado);
} // final lerUmProduto
    // Essa função retorna um ARRAY






function atualizarProduto($conexao, $id, $nome, $preco, $descricao, $quantidade, $fabricanteId){
    $sql = "UPDATE produtos SET nome = '$nome' , preco = $preco, descricao = '$descricao', quantidade = $quantidade, fabricante_Id = $fabricanteId WHERE id = $id";

    // $sql = "UPDATE produtos SET nome = '$nome' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // final atualizarProdutos






function excluirProduto($conexao, $id) {
    $sql = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}




function formataMoeda($valor){
    return " R$ ".number_format($valor, 2, ",", ".")." reais ";
}
//5.000 -> R$ 5.000,00



