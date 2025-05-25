<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Salvar Categoria</title>
</head>

<body style="background-color: navy;">
    <?php

    include('ConexaoBanco.php');
    
    $nome = $_POST['nome'];

    $select = "SELECT * FROM categoria WHERE nome = '$nome'";
    $resultado = $con->query($select);

    if($resultado->num_rows > 0){

        echo "
        
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; font-size: 70px; color: white;'>Categoria já cadastrada</h1>
                <p style='font-family: Times New Roman; font-size: 30px; color: white;'>Essa categoria já existe no sistema.</p><br><br><br>
                <a href='CriarCategoria.php' class='botaoCancelar'>Voltar</a>
        
        ";


    }else{
        $sql = "INSERT INTO categoria (nome) VALUES ('$nome')";
        $con->query($sql);
        
        echo "
        
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; font-size: 70px; color: white;'>Categoria cadastrada com sucesso</h1>
                <p style='font-family: Times New Roman; font-size: 30px; color: white;'>A categoria foi cadastrada com sucesso.</p>
                <a href='menu.php' class='botaoAcessar'>Menu</a>
            </div>
        
        ";
    }
    ?>
</body>
</html>