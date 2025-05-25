

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
include("ConexaoBanco.php");
session_start();

$query = "SELECT produto.id, produto.nome AS nome_produto, produto.preco, categoria.nome AS nome_categoria, produto.caminho_imagem 
          FROM produto 
          INNER JOIN categoria ON produto.id_categoria = categoria.id
          WHERE id_vendedor = '".$_SESSION['id']."'";


$resultado = $con->query($query);

if($resultado->num_rows > 0){
    echo "
          <div style ='background-color: navy; padding: 40px; text-align: center; display: flex; justify-content: space-between; align-items: center;'>
            <h1 style= 'font-family: Times New Roman; color: white;'>Meus Produtos</h1>
                <div>
                    <a href='menu.php' class='btn btn-primary' style='font-family: Times New Roman; font-size: 24px;'>⬅️ Voltar ao Menu</a> 
                </div>
          </div>
          <table class='table'>
          <thead>
                <tr>
                <th style='background-color: #1E90FF;'>ID</th>
                <th style='background-color: #1E90FF;'>Nome</th>
                <th style='background-color: #1E90FF;'>Preço</th>
                <th style='background-color: #1E90FF;'>Categoria</th>
                <th style='background-color: #1E90FF;'>Imagem</th></tr>
          </thead>
          <tbody>";

    while($produto = $resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$produto['id']."</td>";
        echo "<td>".$produto['nome_produto']."</td>";
        echo "<td>".$produto['preco']."</td>";
        echo "<td>".$produto['nome_categoria']."</td>";
        echo "<td>
        <img src='". $produto['caminho_imagem'] ."' alt='Imagem do Produto' width='100'>
        <a href='ExcluirProduto.php?id=". $produto['id'] ."' class='btn btn-danger' style='margin-left: 20px;'>🗑️ Excluir</a>
        <a href='EditarProduto.php?id=". $produto['id'] ."' class='btn btn-primary' style='margin-left: 20px;'>✏️ Editar</a>
      </td>";

        echo "</tr>";
    }
    echo "</tbody></table>";
}else{
    echo "<div style='text-align: center; background-color: navy; padding: 40px; padding-bottom: 665px;'>
            <h1 style='font-family: Times New Roman; color: white; font-size: 70px'>Você ainda não tem produtos cadastrados!</h1>
            <a href='CadastroProduto.php' class='btn btn-primary' style='font-family: Times New Roman; font-size: 40px;'>Cadastrar Produto</a>
            <a href='menu.php' class='btn btn-primary' style='font-family: Times New Roman; font-size: 40px; margin: 20px;'>⬅️ Voltar ao Menu</a>
          </div>";
}
?>
</body>
</html>