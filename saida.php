<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Saida de itens</title>
    <script src="script.js"></script>
</head>
<body>
    <h3>Registre a Saída do Produto:</h3>
    <?php
include_once('conexao.php');
$id_prod = $_GET['id'];
$buscar=mysqli_query($conexao, "SELECT * FROM Produto WHERE id_produto = '$id_prod'");
while($linha=mysqli_fetch_array($buscar)){
echo "<h5>{$linha['nome']}</h5>";
}
    ?>

<br><br><br>
<form method="post">
<label>Quantas Unidades Sairam:</label>
<input type="number" name="und" required>
<input type="hidden" name="id_prod" value="<?php echo "$id_prod"; ?>">

<input type="submit" value="Registrar saída">



</form>
<?php
if($_POST){
$und = $_POST['und'];
$id_prod = $_POST['id_prod'];

$verificar=mysqli_query($conexao, "SELECT * FROM Produto WHERE id_produto='$id_prod'");
while($linha=mysqli_fetch_array($verificar)){
    
    if($linha['qtdInicial']<=$und){
        echo "<script>
        avisoSaida(); 
        </script>";
    }
    else{ 
$verificar=mysqli_query($conexao, "SELECT * FROM Produto WHERE id_produto='$id_prod'");
while($linha=mysqli_fetch_array($verificar)){
    $subtrair = $linha['qtdInicial'] - $und;
    $manda = mysqli_query(
    $conexao,
    "UPDATE Produto 
     SET qtdInicial = '$subtrair' 
     WHERE id_produto = '$id_prod'"
);
if($manda){
    header("refresh:2;url=index.php");
    echo "<p>Saída Registrada com Sucesso</p>";
    echo "<h5>Redirecionando para o Início...</h5>";
}
else{
     echo "<p>Saída Nao Registrada</p>";
     echo "<h5>Tente Novamente...</h5>";

}

}
        

    }

}



}

?>


</body>
</html>