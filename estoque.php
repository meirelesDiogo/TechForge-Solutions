<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Gerenciamento de Estoque</title>
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="data.php">DataGrid</a>
    <a href="cadastro.php">Cadastro de Produtos</a>
    <a href="estoque.php">Movimentação Estoque</a>
</nav>

<h4>Gerenciamento de Estoque</h4>
<p>Selecione uma peça para registrar uma entrada ou saída do estoque</p>

Selecione a peça: <?php
include_once('conexao.php');

$busca = mysqli_query($conexao,"");

?>

    
</body>
</html>