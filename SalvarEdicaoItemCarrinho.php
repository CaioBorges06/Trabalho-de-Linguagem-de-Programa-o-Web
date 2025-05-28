<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Salvar edição</title>
</head>
<body style="background-color: navy;">
    
    <?php
    
    include("ConexaoBanco.php");
    session_start();

    $id = $_GET['id'];
    $quantidade = $_POST['quantidade'];
    echo $quantidade;
    echo $id;

    $query = "UPDATE carrinho SET quantidade = $quantidade WHERE id = '$id'";
    $resultado = $con->query($query);

    if($resultado){
        echo "
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Item editado com sucesso!</h1><br><br>
                <a href='MeuCarrinho.php' class='btn btn-primary' style='font-size: 40px; font-family: Times New Roman;'>⬅️ Voltar ao Meu Carrinho</a>
            </div> 
        ";

    }else{
        echo "
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; color: white;'>Erro ao editar item!</h1><br><br>
                <a href='MeuCarrinho.php' class='btn btn-primary'>Voltar ao Meu Carrinho</a>
            </div>
        ";
    }
    ?>

</body>
</html>