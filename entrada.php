<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Entrada de Produto</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="movimento">
<nav>

<a href="index.php" class="logo">
    <span>Tech</span><span class="accent">Forge</span>
</a>

<div class="links">

<a href="index.php">Home</a>
<a href="data.php">DataGrid</a>
<a href="cadastro.php">Cadastro de Produtos</a>
<a href="estoque.php">Movimentação Estoque</a>

</div>

</nav>

<?php
include_once('conexao.php');

$id_prod = $_GET['id'];

$buscar = mysqli_query(
    $conexao,
    "SELECT * FROM Produto WHERE id_produto = '$id_prod'"
);

$produto = mysqli_fetch_array($buscar);
?>

<h3>Registre a Entrada do Produto</h3>

<h5><?php echo $produto['nome']; ?></h5>


<div class="card-entrada">

<form method="post">

<label>Quantidade que entrou</label>

<input type="number" name="und" required>

<input type="hidden" name="id_prod" value="<?php echo $id_prod; ?>">

<input type="submit" value="Registrar Entrada">

</form>

</div>


<?php

if($_POST){

    $und = $_POST['und'];
    $id_prod = $_POST['id_prod'];

    $buscar = mysqli_query(
        $conexao,
        "SELECT * FROM Produto WHERE id_produto='$id_prod'"
    );

    $linha = mysqli_fetch_array($buscar);

    $soma = $linha['qtdInicial'] + $und;

    $update = mysqli_query(
        $conexao,
        "UPDATE Produto 
         SET qtdInicial = '$soma'
         WHERE id_produto = '$id_prod'"
    );

    if($update){

        echo "
        <div class='msg success'>
            Entrada registrada com sucesso!
        </div>

        <script>
        setTimeout(()=>{
            window.location='index.php';
        },2000);
        </script>
        ";

    }else{

        echo "
        <div class='msg error'>
            Erro ao registrar entrada!
        </div>
        ";

    }

}

?>

</body>
</html>