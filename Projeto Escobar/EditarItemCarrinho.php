<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">]
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title> 
</head>
<body style="background-color: navy;">

<?php

include("ConexaoBanco.php");
session_start();
$id = $_GET['id'];

$query = "SELECT * FROM carrinho WHERE id = '$id'";

$con->query($query);
$resultado = $con->query($query);
$carrinho = $resultado->fetch_assoc();




echo    "
        <div style='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Editar Item do Carrinho</h1><br>
            <form action='SalvarEdicaoItemCarrinho.php?id=".$id."' method='POST'>

            <label for='nome' style='color: white; font-family: Times New Roman;'>Quantidade:</label>
            <input type='number' name='quantidade' value=" .$carrinho['quantidade']." required><br><br>

            <button type='submit' class='btn btn-success'>Salvar Alterações</button>
            <a href= 'MeuCarrinho.php' type='submit' class='btn btn-danger'>Cancelar</a>
            ";


        ?>  
    </form>    
</body>
</html>