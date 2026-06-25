<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForge Solutions | Edição de Produtos</title>
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#0b0d12;
    color:white;
}


/* ===== NAVBAR ===== */

nav{
    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:18px 8%;

    background:#141820;

    border-bottom:1px solid #ffffff10;
}

nav a{
    color:#cfcfcf;
    text-decoration:none;
    margin-right:20px;
    transition:.3s;
}

nav a:hover{
    color:#ff8a00;
}


/* ===== LOGO ===== */

.logo{
    font-size:22px;
    font-weight:900;
    display:flex;
}

.logo span:first-child{
    color:#fff;
}

.logo .accent{
    color:#ff8a00;
}


/* ===== FORM BOX ===== */

.form-box{

    width:420px;
    margin:60px auto;

    background:#141820;

    padding:30px;

    border-radius:15px;

    border:1px solid #ffffff10;

    box-shadow:0 15px 40px rgba(0,0,0,0.5);

}


/* TITULO */

.form-box h2{
    text-align:center;
    margin-bottom:20px;
    color:#ff8a00;
}


/* LABEL */

label{
    display:block;
    margin-top:10px;
    margin-bottom:5px;
    color:#bbb;
    font-size:14px;
}


/* INPUTS */

input, select{

    width:100%;
    height:45px;

    padding:10px;

    border-radius:8px;

    border:1px solid #333;

    background:#0d1016;

    color:white;

    outline:none;

    margin-bottom:10px;

}


/* BOTÃO */

button{

    width:100%;
    height:45px;

    background:#ff8a00;

    border:none;

    border-radius:8px;

    color:white;

    font-weight:bold;

    cursor:pointer;

    transition:.3s;

}


button:hover{
    background:#ff9f2f;
    transform:translateY(-2px);
}


/* MENSAGENS */

.msg{

    width:420px;
    margin:20px auto;

    padding:15px;

    border-radius:10px;

    text-align:center;

    font-weight:bold;

}

.success{
    background:#1c7c3c;
}

.error{
    background:#b3261e;
}


/* RESPONSIVO */

@media(max-width:500px){

.form-box{
    width:90%;
}

}
    </style>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav>

<a href="index.php" class="logo">
    <span>Tech</span><span class="accent">Forge</span>
</a>

<div class="links">

<a href="index.php">Home</a>
<a href="data.php">DataGrid</a>
<a href="cadastro.php">Cadastro</a>
<a href="estoque.php">Estoque</a>

</div>

</nav>


<?php
include_once('conexao.php');

$id = $_GET['id'];

$busca = mysqli_query(
    $conexao,
    "SELECT * FROM Produto WHERE id_produto = '$id'"
);

$produto = mysqli_fetch_array($busca);
?>



<div class="form-box">

<h2>Editar Produto</h2>



<form method="POST">

<input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">


<label>Nome</label>
<input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>


<label>Quantidade</label>
<input type="number" name="qtd" value="<?php echo $produto['qtdInicial']; ?>">


<label>Valor Unitário</label>
<input type="number" step="0.01" name="valor" value="<?php echo $produto['valorUnt']; ?>">


<label>Categoria</label>

<select name="cat">

<?php

$cat = mysqli_query($conexao, "SELECT * FROM Categoria");

while($c = mysqli_fetch_array($cat)){

$selected = ($c['id_categoria'] == $produto['id_categoria']) ? "selected" : "";

echo "
<option value='{$c['id_categoria']}' $selected>
{$c['nome_categoria']}
</option>
";

}

?>

</select>


<button type="submit">Salvar Alterações</button>

</form>

</div>



<?php

if($_POST){

$nome = $_POST['nome'];
$qtd = $_POST['qtd'];
$valorUnt = $_POST['valor'];
$id_cat = $_POST['cat'];
$id_prod = $_POST['id_produto'];


$manda = mysqli_query(
$conexao,
"UPDATE Produto 
SET nome='$nome',
qtdInicial='$qtd',
valorUnt='$valorUnt',
id_categoria='$id_cat'
WHERE id_produto='$id_prod'"
);


if($manda){

echo "
<div class='msg success'>
Produto atualizado com sucesso!
</div>

<script>
setTimeout(()=>{
window.location='data.php';
},2000);
</script>
";

}else{

echo "
<div class='msg error'>
Erro ao atualizar produto!
</div>
";

}

}

?>

</body>
</html>