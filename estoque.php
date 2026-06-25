<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Gerenciamento de Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body><nav>

<div class="logo">
    TechForge
</div>


<div class="links">

<a href="index.php">Home</a>
<a href="data.php">DataGrid</a>
<a href="cadastro.php">Cadastro de Produtos</a>
<a href="estoque.php">Movimentação Estoque</a>

</div>

</nav>
<div class="estoque-box">


<h2>
Gerenciamento de Estoque
</h2>


<p>
Selecione uma peça para registrar entrada ou saída
</p>



<form method="post">


<label>
Produto
</label>


<?php

include_once('conexao.php');


$busca = mysqli_query(
$conexao,
"SELECT * FROM Produto"
);


echo "<select name='id_prod'>";


while($linha=mysqli_fetch_array($busca)){

echo "

<option value='{$linha['id_produto']}'>
{$linha['nome']}
</option>

";

}


echo "</select>";

?>



<div class="opcoes">


<label class="radio-card">

<input 
type="radio"
name="opcao"
value="Registrar Entrada">


<span>
Registrar Entrada
</span>

</label>



<label class="radio-card">

<input 
type="radio"
name="opcao"
value="Registrar Saída">


<span>
Registrar Saída
</span>

</label>


</div>


<button type="submit">
Continuar
</button>



</form>


</div>
<?php
include_once('conexao.php');
if($_POST){

    $id_prod = $_POST['id_prod'];
    $opcao = $_POST['opcao'];

    if($opcao == 'Registrar Entrada'){

        header("Location: entrada.php?id=$id_prod&opcao=$opcao");

    }else{

        header("Location: saida.php?id=$id_prod&opcao=$opcao");

    }

}

    
?>

</body>
</html>