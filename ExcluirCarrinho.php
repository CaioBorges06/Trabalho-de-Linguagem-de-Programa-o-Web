<?php

include("ConexaoBanco.php");
session_start();

$id = $_SESSION['id'];

$query1 = "DELETE FROM carrinho WHERE id_usuario = '$id'";

$con->query($query1);


header("Location: MeuCarrinho.php");



?>