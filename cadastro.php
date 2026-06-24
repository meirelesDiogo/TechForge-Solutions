<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Cadastro de Produtos</title>
</head>
<body>
    <nav>
    <a href="index.php">Home</a>
    <a href="data.php">DataGrid</a>
    <a href="cadastro.php">Cadastro de Produtos</a>
    <a href="estoque.php">Movimentação Estoque</a>
</nav>
    <h2>Cadastro De Produtos</h2>

    <form method="post">

    Nome: <input type="text" name="nome" required><br>
    Quantidade: <input type="number" name="qtd" required><br>
    Valor Unitário: <input type="number" step="0.01" name="valor"><br>
    Categoria: <select name="cat" >
        <?php
include_once('conexao.php');
$busca = mysqli_query($conexao, "SELECT * FROM Categoria");
while($linha=mysqli_fetch_array($busca)){
    echo "<option value='{$linha['id_categoria']}'>".$linha['nome_categoria']."</option>";   
} ?>
    </select>

    <input type="submit" value="Cadastrar">


    </form>

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