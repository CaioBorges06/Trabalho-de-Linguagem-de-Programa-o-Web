

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">]
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Editar produto</title> 
</head>
<body style="background-color: navy;">

<?php

include("ConexaoBanco.php");
session_start();
$id = $_GET['id'];

$query = "SELECT produto.id as id, produto.nome as nome, produto.preco as preco, categoria.nome as categoria, produto.caminho_imagem as caminho_imagem
          FROM produto
          INNER JOIN categoria ON produto.id_categoria = categoria.id
          WHERE produto.id = '$id'";

$con->query($query);
$resultado = $con->query($query);
$produto = $resultado->fetch_assoc();

 $query1 = "SELECT nome FROM categoria;";
    $resultado1 = $con->query($query1);




echo    "
        <div style='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Editar Produto</h1><br>
            <form action='SalvarEdicaoProduto.php' method='POST' enctype='multipart/form-data'>

            <label for='nome' style='color: white; font-family: Times New Roman;'>ID do Produto:</label>
            <input type='text' name='id' id='id' value=" .$produto['id']." required readonly><br><br>

            <label for='nome' style='color: white; font-family: Times New Roman;'>Nome do Produto:</label>
            <input type='text' name='nome' id='nome' value=" .$produto['nome']." required><br><br>

            <label for='preco' style='color: white; font-family: Times New Roman;'>Preço:</label>
            <input type='number' name='preco' id='preco' value=" .$produto['preco']." required><br><br>

            ";


            echo"<select name='categoria' id='categoria' style='border-radius: 10px; padding: 4px;'>";
            
            while ($opcao = $resultado1->fetch_assoc()) {
            echo "<option value='" . $opcao['nome'] . "'";
            if ($opcao['nome'] == $produto['categoria']) {
                echo " selected";
            }
            echo ">" . $opcao['nome'] . "</option>";
            }


            echo"</select><br><br>";

            echo    "
            
            <label style='color: white; font-family: Times New Roman;'>Imagem atual:</label><br>
            <img src='".$produto['caminho_imagem']."' alt='Imagem atual' width='150'><br><br>

            <label for='descricao' style='color: white; font-family: Times New Roman;'>Nova imagem:</label>
            <input type='file' name='imagem' id='imagem' accept='.jpg, .jpeg, .png, .gif' ><br><br>

            <button type='submit' class='btn btn-success'>Salvar Alterações</button>
            <a href= 'MeusProdutos.php' type='submit' class='btn btn-danger'>Cancelar</a>
            ";


echo    "<input type='hidden' name='caminho_atual' value='".$produto['caminho_imagem']."'>";


        ?>  
    </form>    
</body>
</html>