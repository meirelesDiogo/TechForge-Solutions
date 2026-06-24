<?php

include_once("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM Produto WHERE id_produto=$id";

mysqli_query($conexao,$sql);

header("Location: data.php");

?>