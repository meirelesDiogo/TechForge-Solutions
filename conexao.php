<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "Techforge";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Opcional: definir charset UTF-8
$conexao->set_charset("utf8");

?>