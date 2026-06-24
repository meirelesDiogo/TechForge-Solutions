<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <nav>
    <a href="index.php">Home</a>
    <a href="data.php">DataGrid</a>
    <a href="cadastro.php">Cadastro de Produtos</a>
    <a href="estoque.php">Movimentação Estoque</a>
</nav>
<br>

<form method="GET">
    <input type="text" name="pesquisa" placeholder="Pesquisar produto ou categoria">
    <button type="submit">Pesquisar</button>
</form>
<?php
include_once("conexao.php");

$pesquisa = $_GET['pesquisa'] ?? '';

$sql = "SELECT Produto.*, Categoria.nome_categoria
        FROM Produto
        INNER JOIN Categoria
        ON Produto.id_categoria = Categoria.id_categoria";

if ($pesquisa != "") {
    $sql .= " WHERE Produto.nome LIKE '%$pesquisa%'
              OR Categoria.nome_categoria LIKE '%$pesquisa%'";
}

$resultado = mysqli_query($conexao, $sql);

?>

<div class="produtos">

<?php

if (mysqli_num_rows($resultado) > 0) {

    while($produto = mysqli_fetch_assoc($resultado)) {

?>
<div class="card">

    <h3><?php echo $produto['nome']; ?></h3>

    <p>
        Categoria:
        <?php echo $produto['nome_categoria']; ?>
    </p>

    <p>
        Estoque:
        <?php echo $produto['qtdInicial']; ?>
    </p>

    <p>
        R$ <?php echo number_format($produto['valorUnt'],2,",","."); ?>
    </p>


    <a href="editar.php?id=<?php echo $produto['id_produto']; ?>">
        <button>Editar</button>
    </a>


    <a 
      href="excluir.php?id=<?php echo $produto['id_produto']; ?>"
      onclick="return confirm('Deseja excluir este produto?')"
    >
        <button>Excluir</button>
    </a>

</div>
<?php
    }

} else {

    echo "<h2>Nenhum item encontrado</h2>";

}

?>

</div>

    
</body>
</html>