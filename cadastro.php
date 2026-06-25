<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Cadastro de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>

<div class="logo">
    TechForge
</div>


<div class="links">

<a href="index.php">Home</a>
<a href="data.php">DataGrid</a>
<a href="cadastro.php">Cadastro de Produtos</a>
<a href="estoque.php">Movimentação Estoque</a>

</div>

</nav><h2 class="titulo">
Cadastro de Produtos
</h2>


<div class="form-box">


<form method="post">


<label>
Nome do Produto
</label>

<input 
type="text" 
name="nome" 
required>



<label>
Quantidade
</label>

<input 
type="number" 
name="qtd" 
required>



<label>
Valor Unitário
</label>

<input 
type="number" 
step="0.01" 
name="valor">



<label>
Categoria
</label>


<select name="cat">


<?php

include_once('conexao.php');


$busca = mysqli_query(
$conexao,
"SELECT * FROM Categoria"
);


while($linha=mysqli_fetch_array($busca)){

echo "

<option value='{$linha['id_categoria']}'>
{$linha['nome_categoria']}
</option>

";

}

?>


</select>



<button type="submit">
Cadastrar Produto
</button>


</form>


</div>

    <?php
    include_once('conexao.php');
    if($_POST){
        $nome = $_POST['nome'];
        $qtd = $_POST['qtd'];
        $valor = $_POST['valor'];
        $id_cat = $_POST['cat'];

       $cadastra = mysqli_query($conexao, "INSERT INTO Produto(nome,qtdInicial,valorUnt,id_categoria) VALUES('$nome','$qtd','$valor','$id_cat')"); 

       if($cadastra){
        header("Location:conclusao.php");
       }
       else{
        echo "<h4>Não foi possivel Cadastrar.Tente Novamente...</h4>";
       }
    }
    ?>


</body>
</html>