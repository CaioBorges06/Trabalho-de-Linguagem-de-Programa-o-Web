<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Detalhes do Comprador</title>
</head>
<body>
    <?php
    
    include("ConexaoBanco.php");
    session_start();

    $idVenda = $_GET['id'];

    $query = "select usuario.id, usuario.nome, usuario.email from usuario
              inner join vendas
              on vendas.id_comprador = usuario.id
              where vendas.id = $idVenda;";

    $resultado = $con->query($query);

    $resultado = $resultado->fetch_assoc();
    $id = $resultado['id'];
    $nome = $resultado['nome'];
    $email = $resultado['email'];

    echo"
    
    <div style='text-align: center; display: flex; justify-content: space-between; padding: 60px; background-color: navy;'>
        <h1 style='font-family: Times New Roman; font-size: 60px; color: white;'>Detalhes do Comprador</h1>
        <a href='MinhasVendas.php' class='btn btn-success' style='font-size: 40px;'>⬅️ Voltar</a>
    </div>
    <div style=' text-align: left; padding: 30px;'>
            <p style='font-size: 40px; font-family: Times New Roman;'>ID: ". $id ."</p><br>
            <p style='font-size: 40px; font-family: Times New Roman;'>Nome: ". $nome ."</p><br>
            <p style='font-size: 40px; font-family: Times New Roman;'>email: ". $email ."</p><br>
        </div>
    
    ";


    ?>
</body>
</html>