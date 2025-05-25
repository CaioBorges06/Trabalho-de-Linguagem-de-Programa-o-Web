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

$id = $_GET['id'];


if(!isset($_SESSION['id'])){


    echo"
    
        <div style='text-align: center; padding: 40px;'>
            <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'><strong>Você precisa estar conectado em uma conta para Adicionar ao Carrinho!</strong></h1>
            <h2 style='font-family: Times new Roman; color: white;'></h2>
            <a href='LoginUsuario.php' class='btn btn-primary' style='font-family: Times New Roman; font-size: 30px;'>↪ Fazer Login</a>
            <a href='VerProduto.php?id=" . $id . "' class='btn btn-primary' style='font-family: Times New Roman; font-size: 30px;'>❌ Cancelar</a>
        </div>
    
    ";

}else{

    echo "
    <form action='SalvarNoCarrinho.php?id".$id."' method='GET'>
        <label for='quantidade' style='font-family: Times New Roman; font-size: 20px; color: white;'>Quantidade:</label>
        <input type='number' class='form-control' name='quantidade' placeholder='Quantidade' value='1' required><br><br>
        <input type='submit' class='btn btn-success' value='Adicionar' style='font-family: Times New Roman; font-size: 20px;'>
        <input type='hidden' name='id' value='" . $id . "'>
    </form>
";


}

?>

</body>
</html>