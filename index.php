<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TechForge Solutions | Dashboard</title>

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


</nav>



<main>


<h1>
Dashboard Estoque
</h1>



<?php

include_once('conexao.php');


// TOTAL DE PRODUTOS

$busca = mysqli_query(
$conexao,
"SELECT COUNT(*) AS total_produtos FROM Produto"
);


$dados = mysqli_fetch_assoc($busca);


$total = $dados['total_produtos'];




// ESTOQUE BAIXO

$consulta = mysqli_query(
$conexao,
"SELECT COUNT(*) AS estoque_baixo 
FROM Produto 
WHERE qtdInicial <= 5"
);


$dados = mysqli_fetch_assoc($consulta);


$baixo = $dados['estoque_baixo'];

?>


<section class="cards">



<div class="card">


<h3>
Total de Itens Cadastrados
</h3>


<h2 
class="contador"
data-valor="<?php echo $total; ?>">
0
</h2>


<div class="barra">

<div 
class="progresso"
style="
width:<?php echo min($total * 10,100); ?>%;
">
</div>

</div>


<p>
Produtos cadastrados no sistema
</p>


</div>





<div class="card">


<h3>
Itens com Estoque Baixo
</h3>


<h2 
class="contador"
data-valor="<?php echo $baixo; ?>">
0
</h2>



<div class="barra">


<div 
class="progresso baixo"
style="
width:<?php echo min($baixo * 20,100); ?>%;
">

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


$produtos = mysqli_query(
$conexao,
"SELECT * FROM Produto WHERE qtdInicial <= 5"
);



if(mysqli_num_rows($produtos) > 0){



while($linha=mysqli_fetch_array($produtos)){



?>



<div class="produto">


<div>


<h3>
<?php echo $linha['nome']; ?>
</h3>


<p>

Quantidade:

<span>
<?php echo $linha['qtdInicial']; ?>
</span>

</p>


</div>



<div>

<p>

Valor:

R$

<?php

echo number_format(
$linha['valorUnt'],
2,
",",
"."
);

?>

</p>


</div>



</div>



<?php

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






<script>


const contadores = document.querySelectorAll(".contador");



contadores.forEach(contador=>{


let valorFinal = Number(
contador.dataset.valor
);


let atual = 0;

let velocidade = Math.ceil(
    valorFinal / 100
);



let animar = setInterval(()=>{


atual += velocidade;



if(atual >= valorFinal){

atual = valorFinal;

clearInterval(animar);

}



contador.innerHTML = atual;



},50);



});



</script>



</body>

</html>