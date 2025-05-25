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

    $id = $_SESSION['id'];
    $data = date("Y-m-d H:i:s");

    $query1 = "SELECT * FROM carrinho WHERE id_usuario = $id;";
    $resultado = $con->query($query1);    

    while($carrinho = $resultado->fetch_assoc()){    

        $id_carrinho = $carrinho['id'];
        $quantidade = $carrinho['quantidade'];
        $id_produto = $carrinho['id_produto'];
        $id_comprador = $carrinho['id_usuario'];
        $query2 = "INSERT INTO vendas (quantidade, id_comprador, id_produto, data_venda) VALUES ($quantidade, $id_comprador, $id_produto, '$data');";
        $con->query($query2);
        $query3 = "DELETE FROM carrinho WHERE id = $id_carrinho;";
        $con->query($query3);

    }

    $resultado2 = $con->query($query1);
    if($resultado2->num_rows == 0){
        echo "
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Compra realizada com sucesso!</h1>
                <p style='font-family: Times New Roman; font-size: 30px; color: white;'>Obrigado por confiar no nosso serviço ❤<p>
                <a href='menu.php' class='btn btn-success' style ='font-family: Times New Roman; font-size: 40px;'>Menu</a>
            </div>
        ";
    }
    
    ?>
</body>
</html>