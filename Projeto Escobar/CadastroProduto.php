



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body style='background-color: navy;'>

<?php

include("ConexaoBanco.php");
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>alert('Você não está logado!');</script>";
}else{

    $query = "SELECT nome FROM categoria;";
    $resultado = $con->query($query);



echo    "

         <div style='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'>Cadastrar Produto</h1>
        <p style='font-family: Times New Roman; color: white;'>Preencha os dados do produto abaixo.</p>

        <form action='SalvarProduto.php' method='POST' enctype='multipart/form-data'>
            <label for='nome' style='font-family: Times New Roman; color: white;'>Nome do Produto:</label><br>
            <input type='text' name='nome' id='nome' required><br><br>

            <label for='preco' style='font-family: Times New Roman; color: white;'>Preço:</label><br>
            <input type='number' name='preco' id='preco'step='0.01' required><br><br>

            <label for='imagem' style='font-family: Times New Roman; color: white;'>Imagem do Produto:</label><br><br>
            <input type='file' name='imagem' id='imagem' accept='.jpg, .jpeg, .png, .gif' required><br><br>
            
            <label for='categoria' style='font-family: Times New Roman; color: white;'>Categoria: </label><br><br>
            ";


            echo"<select name='categoria' id='categoria' style='border-radius: 10px; padding: 4px;'>";
            
            while ($opcao = $resultado->fetch_assoc()){

            echo"<option value='".$opcao['nome']."'>".$opcao['nome']."</option>";


            }

            echo"</select><br><br>";



            echo"<button type='submit' class='btn btn-success' style='font-family: Times New Roman;font-size: 18px; '>Cadastrar Produto</button><br><br>
        </form>
        <a href='menu.php' class='btn btn-danger' style='font-family: Times New Roman; font-size: 18px;'> Cancelar</a>
    </div>
        ";
}
        ?>
    </form>    
</body>
</html>
