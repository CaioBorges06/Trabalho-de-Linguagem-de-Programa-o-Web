<?php

include("ConexaoBanco.php");

session_start();

$idUsuario = $_SESSION['id'];

// 1. Carrinho (se for ligado ao usuário)
$query1 = "DELETE FROM `carrinho` WHERE carrinho.id_usuario = '$idUsuario'";

// 2. Vendas onde o usuário é comprador
$query3 = "DELETE FROM `vendas` WHERE vendas.id_comprador = '$idUsuario'";

// 3. Vendas onde o usuário é vendedor (produtos vendidos por ele)
$query5 = "DELETE vendas FROM vendas
           INNER JOIN produto ON produto.id = vendas.id_produto
           WHERE produto.id_vendedor = '$idUsuario'";

// 4. Produtos do usuário
$query2 = "DELETE FROM `produto` WHERE produto.id_vendedor = '$idUsuario'";

// 5. Usuário
$query4 = "DELETE FROM `usuario` WHERE id = '$idUsuario'";



session_unset();
session_destroy();

$con->query($query1);
$con->query($query3);
$con->query($query5);
$con->query($query2);
$con->query($query4);

header("Location: menu.php");

?>