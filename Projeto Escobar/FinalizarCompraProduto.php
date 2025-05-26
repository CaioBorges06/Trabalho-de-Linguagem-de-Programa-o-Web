<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Finalizar compra do produto</title>
</head>
<body style="background-color: navy;">

    <?php
    include("ConexaoBanco.php");
    session_start();
    $id = $_GET['id'];
    $data = date("Y-m-d H:i:s");
    $quantidade = $_GET['quantidade'];
    $id_comprador = $_SESSION['id'];
    
    $query = "INSERT INTO vendas (quantidade, id_comprador, id_produto, data_venda) VALUES ($quantidade, $id_comprador, $id, '$data');";
    $resultado = $con->query($query);

    if($resultado){
        echo "
                <div style='text-align: center; padding: 40px;'>
                    <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Compra realizada com sucesso!</h1>
                    <p style='font-family: Times New Roman; font-size: 30px; color: white;'>Obrigado por confiar no nosso serviço ❤<p>
                    <a href='menu.php' class='btn btn-success' style ='font-family: Times New Roman; font-size: 40px;'>Menu</a>
                </div>
        ";
    }else{
        echo "
                <div style='text-align: center; padding: 40px;'>
                    <h1 style='font-family: Times New Roman; color: white;'>Erro ao realizar a compra!</h1>
                    <p style='font-family: Times New Roman; color: white; font-size: 30px;'>Tente novamente mais tarde.</p>
                </div>
        ";
    }
    
    ?>

</body>
</html>