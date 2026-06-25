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

Selecione a peça: 
<form method="post">

<?php

include_once('conexao.php');

$busca = mysqli_query($conexao,"SELECT * FROM Produto");
echo "<select name='id_prod'>";
while($linha=mysqli_fetch_array($busca)){
echo "<option value='{$linha['id_produto']}'>{$linha['nome']}</option>";




}
echo "</select>";
?>
<input 
type="radio" 
name="opcao" 
value="Registrar Entrada">

<label>Registrar Entrada</label>

<br>

<input 
type="radio" 
name="opcao" 
value="Registrar Saída">

<label>Registrar Saída</label><br>
    
<input type="submit" value="Cadastrar Entrada Ou Saída">
</form>
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