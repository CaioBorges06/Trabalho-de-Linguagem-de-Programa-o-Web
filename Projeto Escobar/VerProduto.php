<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: navy;">
<?php

include("ConexaoBanco.php");
session_start();

$idProduto = $_GET['id'];

$query = "SELECT produto.id AS id, produto.nome AS nome, produto.preco AS preco, categoria.nome AS categoria,
          produto.caminho_imagem AS caminho_imagem FROM produto 
          INNER JOIN categoria
          ON categoria.id = produto.id_categoria
          WHERE produto.id = '$idProduto'";

$con->query($query);
$resultado = $con->query($query);
$produto = $resultado->fetch_assoc();

echo " 
        <br><br><a href ='menu.php' class='btn btn-success' style='font-size: 40px; font-family: Times New Roman; text-align: left; '>⬅️Voltar ao Menu</a>
        <div style='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Detalhes do Produto</h1><br>

                <p style='font-family: Times New Roman; color: white; font-size: 20px;'> ID: " .$produto['id']. "</p>
                <p style='font-family: Times New Roman; color: white; font-size: 20px;'> Nome: " .$produto['nome']. "</p>
                <p style='font-family: Times New Roman; color: white; font-size: 20px;'> Categoria: " .$produto['categoria']. "</p>
                <img src='".$produto['caminho_imagem']."' alt='Imagem do Produto' style='width: 300px; height: 300px;'><br><br>
                <p style='font-family: Times New Roman; color: white; font-size: 20px;'> Preço: " .$produto['preco']. "</p>
                <a href = 'ComprarProduto.php?id=".$idProduto."' class='btn btn-success' style='font-family: Times New Roman; font-size: 20px;'>Comprar</a>
                <a href = 'AddCarrinho.php?id=".$idProduto."' class='btn btn-success' style='font-family: Times New Roman; font-size: 20px;'>🛒Adicionar ao Carrinho</a>
        </div>
            
            ";

?>
</body>
</html>