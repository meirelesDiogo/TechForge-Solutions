<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Página Inicial</title>
</head>

<body>

<nav>
    <a href="index.php">Home</a>
    <a href="data.php">DataGrid</a>
    <a href="cadastro.php">Cadastro de Produtos</a>
    <a href="estoque.php">Movimentação Estoque</a>
</nav>


<h3>Total de Itens Cadastrados:</h3>

<?php

include_once('conexao.php');


// Conta todos os produtos
$busca = mysqli_query(
    $conexao,
    "SELECT COUNT(*) AS total_produtos FROM Produto"
);

$dados = mysqli_fetch_assoc($busca);

echo $dados['total_produtos'];

?>


<h3>Itens Com Estoque Baixo:</h3>

<?php

// Conta produtos com estoque baixo
$consulta = mysqli_query(
    $conexao,
    "SELECT COUNT(*) AS estoque_baixo 
     FROM Produto 
     WHERE qtdInicial <= 5"
);

$dados = mysqli_fetch_assoc($consulta);

echo "Total com estoque baixo: ".$dados['estoque_baixo'];

echo "<br><br>";


// Mostra produtos com estoque baixo
$consulta = mysqli_query(
    $conexao,
    "SELECT * FROM Produto WHERE qtdInicial <= 5"
);


if(mysqli_num_rows($consulta) > 0){


    while($linha = mysqli_fetch_array($consulta)){


        echo "Nome: ".$linha['nome']."<br>";

        echo "Quantidade: ".$linha['qtdInicial']."<br>";

        echo "Valor: R$ ".
        number_format($linha['valorUnt'],2,",",".")
        ."<br>";

        echo "<hr>";

    }


}else{

    echo "Nenhum produto com estoque baixo.";

}


?>

</body>
</html>