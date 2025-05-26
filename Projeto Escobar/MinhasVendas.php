<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: navy;">

<?php

include("ConexaoBanco.php");
session_start();

$id = $_SESSION['id'];

$query = "
        SELECT 
    vendas.id, 
    produto.nome AS nome, 
    categoria.nome AS categoria, 
    produto.caminho_imagem AS caminho_imagem, 
    produto.preco AS preco, 
    vendas.quantidade AS quantidade
FROM vendas
INNER JOIN produto
    ON produto.id = vendas.id_produto
INNER JOIN usuario
    ON usuario.id = produto.id_vendedor
INNER JOIN categoria
    ON categoria.id = produto.id_categoria
WHERE produto.id_vendedor = $id;";
    
$resultado = $con->query($query);
if($resultado->num_rows > 0){
    echo "
          <div style ='background-color:rgb(6, 1, 48); padding: 40px; text-align: center; display: flex; justify-content: space-between; align-items: center;'>
            <h1 style= 'font-family: Times New Roman; color: white;'>Minhas Vendas</h1>
                <div>
                    <a href='menu.php' class='botaoAcessar' style='font-family: Times New Roman; font-size: 24px;'>⬅ Voltar ao Menu</a> 
                </div>
          </div>
          <table class='table'>
          <thead style='background-color: #1E90FF;'>
                <tr>
                <th style='background-color: #1E90FF;'>ID da Venda</th>
                <th style='background-color: #1E90FF;'>Nome do Produto</th>
                <th style='background-color: #1E90FF;'>Categoria</th>
                <th style='background-color: #1E90FF;'>imagem</th>
                <th style='background-color: #1E90FF;'>Preço</th>
                <th style='background-color: #1E90FF;'>Quantidade</th>
                <th style='background-color: #1E90FF;'>Total da Compra</th>
                <th style='background-color: #1E90FF;'></th></tr>
          </thead>
          <tbody>";

    while($venda = $resultado->fetch_assoc()){
        $total = $venda['preco'] * $venda['quantidade'];
        echo "<tr>";
        echo "<td>".$venda['id']."</td>";
        echo "<td>".$venda['nome']."</td>";
        echo "<td>".$venda['categoria']."</td>";
        echo "<td><img src='". $venda['caminho_imagem'] ."' alt='Imagem do Produto' width='100'></td>";
        echo "<td>".$venda['preco']."</td>";
        echo "<td>".$venda['quantidade']."</td>";
        echo "<td> R$ ".$total."</td>";
        echo "<td style='backgorund-color: navy; align-items: center;'><div style='padding:20px;'><a href='DetalhesComprador.php?id=". $venda['id'] ."' class='botaoAcessar' style='margin-left: 20px;'>detalhes do comprador</a></div></td>";

        echo "</tr>";
    }

}else{

    echo "
        <div style='text-align: center; padding:300px; background-color: navy;'>
            <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Você ainda não fez vendas!</h1><br>
            <a href ='menu.php' class='botaoSalvar' style='font-size: 40px; font-family: Times New Roman;'>⬅ Voltar ao Menu</a>
        </div>
        <div style='background-color: navy;'>
            <h1 style='font-family: Times New Roman; color: navy; font-size: 70px;'>Você ainda não fez vendas!</h1><br>
        </div> 
    ";

}

?>
    
</body>
</html>