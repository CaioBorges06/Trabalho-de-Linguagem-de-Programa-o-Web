<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Meu carrinho</title>
</head>
<body>

<?php

include("ConexaoBanco.php");
session_start();

$id = $_SESSION['id'];

$query = "
        SELECT  
    produto.nome AS nome, 
    categoria.nome AS categoria, 
    produto.caminho_imagem  AS caminho_imagem, 
    produto.preco AS preco, 
    carrinho.quantidade AS quantidade,
    carrinho.id AS id
FROM carrinho
INNER JOIN produto
    ON produto.id = carrinho.id_produto
INNER JOIN usuario
    ON usuario.id = produto.id_vendedor
INNER JOIN categoria
    ON categoria.id = produto.id_categoria
WHERE carrinho.id_usuario = $id;";
    
$resultado = $con->query($query);
if($resultado->num_rows > 0){
    echo "
          <div style ='background-color: navy; padding: 40px; text-align: center; display: flex; justify-content: space-between; align-items: center;'>
            <h1 style= 'font-family: Times New Roman; color: white;'>Meu Carrinho</h1>
                <div>
                    <a href='menu.php' class='botaoAcessar' style='font-family: Times New Roman; font-size: 24px;'>⬅ Voltar ao Menu</a> 
                </div>
          </div>
          <table class='table'>
          <thead style='background-color: #1E90FF;'>
                <tr>
                <th style='background-color: #1E90FF;'>Nome do Produto</th>
                <th style='background-color: #1E90FF;'>Categoria</th>
                <th style='background-color: #1E90FF;'>imagem</th>
                <th style='background-color: #1E90FF;'>Preço</th>
                <th style='background-color: #1E90FF;'>Quantidade</th>
                <th style='background-color: #1E90FF;'>Total da Compra</th>
                <th style='background-color: #1E90FF;'></th>
                <th style='background-color: #1E90FF;'></th></tr>
          </thead>
          <tbody>";


    $TotalCarrinho = 0.00;
    
    while($carrinho = $resultado->fetch_assoc()){
        $total = $carrinho['preco'] * $carrinho['quantidade'];
        $TotalCarrinho += $total;
        echo "<tr>";
        echo "<td>".$carrinho['nome']."</td>";
        echo "<td>".$carrinho['categoria']."</td>";
        echo "<td><img src='". $carrinho['caminho_imagem'] ."' alt='Imagem do Produto' width='100'></td>";
        echo "<td>".$carrinho['preco']."</td>";
        echo "<td>".$carrinho['quantidade']."</td>";
        echo "<td> R$ ".$total."</td>";
        echo"<td><div style='padding: 30px;'><a href='ApagarItemCarrinho.php?id=". $carrinho['id'] ."' class = 'botaoCancelar' >🗑️</a></div></td>";
        echo"<td><div style='padding: 30px;'><a href='EditarItemCarrinho.php?id=". $carrinho['id'] ."' class = 'botaoAcessar' >✏️ Editar</a></div></td>";

        echo "</tr>";
    }

    echo "
    </tbody>
    </table>
    <div style='text-align: center; padding: 20px;'>
        <h1 style='font-family: Times New Roman; color: navy; font-size: 50px;'>Total do Carrinho: R$ " . number_format($TotalCarrinho, 2, ',', '.') . "</h1><br>
        <a href='FinalizarCompraCarrinho.php' class='botaoSalvar' style='font-size: 30px; font-family: Times New Roman;'>Finalizar Compra</a>
        <a href='ExcluirCarrinho.php' class='botaoCancelar' style='font-size: 30px; font-family: Times New Roman; margin: 10px;'>🗑️ Excluir Carrinho</a>
    </div>
";


}else{

    echo "
        <div style='text-align: center; padding: 40px; background-color: navy; padding: 262px;'>
            <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Seu carrinho está vazio!</h1><br>
            <div style='margin-bottom: 254px;'>
                <a href ='menu.php' class='botaoSalvar' style='font-size: 40px; font-family: Times New Roman;'>⬅ Voltar ao Menu</a>
            </div>
        </div>
    ";

}

?>
    
</body>
</html>