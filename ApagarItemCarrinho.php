<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Apagar item do carrinho</title>
</head>
<body>
    <?php
    
        include("ConexaoBanco.php");
        session_start();

        $id = $_GET['id'];

        $apagar = "DELETE FROM carrinho WHERE id = '$id';";

        $con->query($apagar);
        
        header("Location: MeuCarrinho.php");
    
    ?>
</body>
</html>