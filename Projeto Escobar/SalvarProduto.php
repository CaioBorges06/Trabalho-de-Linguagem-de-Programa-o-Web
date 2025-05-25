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

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $qCate = "SELECT id FROM categoria WHERE nome = '$categoria';";

    $ResultadoCate = $con->query($qCate);

    $id_categoria = $ResultadoCate->fetch_assoc()['id'];


    $nomeArquivo = $_FILES['imagem']['name'];
    $caminhoTemporario = $_FILES['imagem']['tmp_name'];
    $caminhoFinal = "uploads/".$nomeArquivo;
    $id_vendedor = $_SESSION['id'];

    move_uploaded_file($caminhoTemporario, $caminhoFinal);

    $query = "INSERT INTO produto(id_vendedor,nome, preco, id_categoria, caminho_imagem) VALUES ('$id_vendedor','$nome', '$preco', '$id_categoria', '$caminhoFinal')";

    $resultado = $con->query($query);

    $select = "SELECT * FROM produto WHERE nome = '$nome' AND preco = '$preco' AND id_categoria = '$id_categoria' AND caminho_imagem = '$caminhoFinal'";
    $resultado_select = $con->query($select);

    if($resultado_select->num_rows > 0){
        echo "
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Produto cadastrado com sucesso!<h1><br><br>
                <tr><td><a href ='menu.php' class='btn btn-primary' style='font-size: 40px;'>Voltar ao Menu</a></td></tr>
            </div>
        ";
    }else{
        echo "<h1>Erro ao cadastrar produto!<h1><br><br>";
        echo "<tr><td><a href ='menu.php' class='btn btn-primary'>Voltar ao Menu</a></td></tr>";
    }

    ?>
    
</body>
</html>





