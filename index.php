<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TechForge Solutions | Página Inicial</title>

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

<a class="sair" href="logout.php">
Sair
</a>


</div>


</nav>



<main>


<h1>
Dashboard Estoque
</h1>



<section class="cards">


<div class="card">

<h3>Total de Itens Cadastrados</h3>


<?php

include_once('conexao.php');


$busca = mysqli_query(
$conexao,
"SELECT COUNT(*) AS total_produtos FROM Produto"
);


$dados = mysqli_fetch_assoc($busca);

$total = $dados['total_produtos'];


echo "<h2>$total</h2>";


?>


<div class="barra">

<div 
class="progresso"
style="width: <?php echo min($total * 10,100); ?>%"
>

</div>

</div>


<p>
Quantidade total cadastrada
</p>


</div>






<div class="card alerta">


<h3>Itens com Estoque Baixo</h3>



<?php


$consulta = mysqli_query(
$conexao,
"SELECT COUNT(*) AS estoque_baixo 
FROM Produto 
WHERE qtdInicial <=5"
);


$dados = mysqli_fetch_assoc($consulta);


$baixo = $dados['estoque_baixo'];


echo "<h2>$baixo</h2>";

?>


<div class="barra">

<div 
class="progresso baixo"
style="width: <?php echo min($baixo * 20,100); ?>%"
>

</div>

</div>


<p>
Produtos precisando reposição
</p>


</div>



</section>





<section class="estoque">


<h2>
Produtos em alerta
</h2>



<?php


$consulta=mysqli_query(
$conexao,
"SELECT * FROM Produto WHERE qtdInicial <=5"
);



if(mysqli_num_rows($consulta)>0){



while($linha=mysqli_fetch_array($consulta)){



echo "

<div class='produto'>

<h3>{$linha['nome']}</h3>

<p>
Quantidade:
<span>
{$linha['qtdInicial']}
</span>
</p>


<p>
Valor:
R$ ".number_format($linha['valorUnt'],2,",",".")."
</p>


</div>


";

}



}else{


echo "

<div class='vazio'>
Nenhum produto com estoque baixo
</div>

";


}


?>


</section>


</main>



</body>
</html>