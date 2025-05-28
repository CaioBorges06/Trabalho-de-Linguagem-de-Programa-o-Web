<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .barraQuantidade {
      padding: 10px;
      width: 100%;
      height: 30px;
      background-color: #f3f3f3;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.97);
      font-size: 30px;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Comprar Produto</title>
    
</head>
<body style="background-color: navy;">

<?php

include("ConexaoBanco.php");
session_start();

$id = $_GET['id'];


if(!isset($_SESSION['id'])){


    echo"
    
        <div style='text-align: center; padding: 40px;'>
            <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'><strong>Você precisa estar conectado em uma conta para comprar!</strong></h1>
            <h2 style='font-family: Times new Roman; color: white;'></h2>
            <a href='LoginUsuario.php' class='botaoSalvar'>↪ Fazer Login</a>
            <a href='VerProduto.php?id=" . $id . "' class='botaoSalvar' style='font-family: Times New Roman; font-size: 30px;'>❌ Cancelar</a>
        </div>
    
    ";

}else{

    echo "
    <div style='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'><strong>Finalizar Compra</strong></h1>
        <h2 style='font-family: Times New Roman; color: white;'>Selecione a quantidade desejada:</h2><br>
    <form action='FinalizarCompraProduto.php' method='GET'>
        <input type='number' class='barraQuantidade' name='quantidade' value='1' min='1' required><br><br><br>
        <input type='submit' class='botaoSalvar' value='Finalizar compra' style='font-size: 40px;'>
        <input type='hidden' name='id' value='" . $id . "'><br><br><br>
    </form>
    <a href='VerProduto.php?id=".$id."' class='botaoCancelar'>Cancelar</a>
    </div>
";


}

?>

</body>
</html>