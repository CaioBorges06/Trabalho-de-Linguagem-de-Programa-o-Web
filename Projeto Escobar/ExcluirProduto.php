<?php

include("ConexaoBanco.php");
session_start();

$id = $_GET['id'];

$query1 = "DELETE FROM vendas WHERE id_produto = '$id'";

$query2 = "DELETE FROM produto WHERE id = '$id'";

$con->query($query1);
$con->query($query2);

header("Location: MeusProdutos.php");



?>