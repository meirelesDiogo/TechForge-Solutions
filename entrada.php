<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Entrada De Produto</title>
</head>
<body>
     <h3>Registre a Entrada do Produto:</h3>
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
<label>Quantas Unidades Entraram</label>
<input type="number" name="und" required>
<input type="hidden" name="id_prod" value="<?php echo "$id_prod"; ?>">

<input type="submit" value="Registrar saída">



</form>
<?php
if($_POST){
    $und = $_POST['und'];
    $id_prod = $_POST['id_prod'];

        $manda = mysqli_query($conexao, "SELECT * FROM Produto WHERE id_produto ='{$id_prod}'");
        while($linha=mysqli_fetch_array($manda)){
            $soma = $linha['qtdInicial'] + $und;

            $mandar=mysqli_query($conexao,"UPDATE Produto SET qtdInicial = '{$soma}'");
            
if($mandar){
    header("refresh:2;url=index.php");
    echo "<p>Entrada Registrada com Sucesso</p>";
    echo "<h5>Redirecionando para o Início...</h5>";
}
else{
     echo "<p>Entrada Nao Registrada</p>";
     echo "<h5>Tente Novamente...</h5>";

}

        }

}
?>
    
</body>
</html>