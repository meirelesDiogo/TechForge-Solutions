<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Edição de Produtos</title>
</head>
<body>  
<?php
include_once('conexao.php');
$id=$_GET['id'];
$busca = mysqli_query($conexao, "SELECT * FROM Produto WHERE id_produto = '$id'");

while($linha = mysqli_fetch_array($busca)){
    echo "<form method='POST'>";
    echo "<input type='hidden' 
        name='id_produto' 
        value='{$linha['id_produto']}'
    >";
    echo "<br>";
    echo "Nome: <input type='text' name='nome' value='{$linha['nome']}' required> ";
    echo "<br>Quantidade: <input type='number' name='qtd' value='{$linha['qtdInicial']}'>";
    echo "<br> Valor Unitário:<input type='number' step='0.01' name='valor' value='{$linha['valorUnt']}' required >";

    echo "<br> Categoria:";
    echo "<select name='cat'>";
$buscar= mysqli_query($conexao, "SELECT * FROM Categoria");
while($linha=mysqli_fetch_array($buscar)){
    echo "<option value='{$linha['id_categoria']}'>".$linha['nome_categoria']."</option>";
}
    echo "</select>";

    echo "<br><input type='submit' value='Editar'>";
    echo "</form>";

}

if($_POST){
$nome= $_POST['nome'];
$qtd= $_POST['qtd'];
$valorUnt= $_POST['valor'];
$id_cat= $_POST['cat'];
$id_prod = $_POST['id_produto'];

$manda = mysqli_query($conexao, "UPDATE Produto SET nome='$nome',qtdInicial='$qtd', valorUnt='$valorUnt',id_categoria='$id_cat' WHERE id_produto='$id_prod'");

if($manda){
    header("refresh:2;url=data.php");
    echo "<h4>Produto Atualizado</h4>";
    echo "<h5>Redirecionando...</h5>";
}
else{
       header("refresh:2;url=data.php");
    echo "<h4>Não foi possivel editar.</h4>";
    echo "<h5>Tente Novamente...</h5>";
}
}




?>


</body>
</html>