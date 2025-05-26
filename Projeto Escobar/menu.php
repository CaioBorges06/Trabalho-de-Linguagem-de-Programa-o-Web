<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device -width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>MENU</title>
</head>
<body>

    <?php
include("ConexaoBanco.php");
session_start();

if(!isset($_SESSION['id'])){
    echo"

    <div style='background-color: navy; padding: 40px;'>
    <div style='display: flex; justify-content: space-between; align-items: center;'>
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'><strong>≡ Menu</strong></h1>
        <div style='font-family: Times New Roman;'>
            <a href='CadastrarUsuario.php' class='botaoAcessar' style='margin-right: 20px; font-size: 30px;'>📝 Cadastrar</a>
            <a href='LoginUsuario.php' class='botaoAcessar' style='font-size: 30px'>↪ Login</a>
        </div>
    </div>
</div><br>

    <form action='menu.php' method='POST'>
        <label for='Pesquisar' style='font-family: Times New Roman ; font-size: 36px' >Pesquisar Produto:</label>
        <input type='text' class='form-control' name='pesquisar' placeholder='pesquisar por nome ou categoria'><br><br>
    
    ";

}else{
    echo"
    
    <div style='background-color: navy; padding: 40px;'>
        <div style='display: flex; justify-content: space-between; align-items: center;'> 
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'><strong>≡ Menu</strong></h1>
        <div style='font-family: Times New Roman; font-size: 40px;'>
            <a href='MeuPerfil.php' class='botaoAcessar' style = 'font-size: 25px;'>👤 Meu Perfil</a>
            <a href='CriarCategoria.php' class='botaoAcessar' style = 'font-size: 25px;'>Criar Categoria</a>
            <a href='MinhasVendas.php' class='botaoAcessar'  style = 'font-size: 25px;'> Minhas Vendas</a>
            <a href='CadastroProduto.php' class='botaoAcessar' style = 'font-size: 25px;'> Cadastrar Produto</a>
            <a href='MeusProdutos.php' class='botaoAcessar' style = 'font-size: 25px;'> Meus Produtos</a>
            <a href='MeuCarrinho.php' class='botaoAcessar' style = 'font-size: 25px;'>🛒 Meu Carrinho </a>
            <a href='Logout.php' class='botaoAcessar' style='font-size: 25px; margin-left: 10px;'>📤 Logout </a>
        </div>
        </div>
    </div><br>

    <form action='menu.php' method='POST'>
        <label for='Pesquisar' style='font-family: Times New Roman ; font-size: 36px' >Pesquisar Produto:</label>
        <input type='text' class='form-control' name='pesquisar' placeholder='pesquisar por nome ou categoria'><br><br>

    ";

    

}

if(isset($_POST['pesquisar'])){
    echo "<br><br>";

$pesquisar = $_POST['pesquisar'];

$query = "SELECT produto.id AS id, produto.nome AS nome, produto.preco AS preco, categoria.nome AS categoria,
          produto.caminho_imagem AS caminho_imagem FROM produto 
          INNER JOIN categoria
          ON categoria.id = produto.id_categoria
          WHERE produto.nome LIKE '%$pesquisar%' 
          OR categoria.nome LIKE '%$pesquisar%'";

$resultado = $con->query($query);
if($resultado->num_rows>0){
    echo "<h1 style='font-family: Times New Roman; font-size: 50px;'>Produtos encontrados:</h1>";
    echo "<table class='table'>";
    echo "<thead>
            <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Imagem</th>
            <th></th>
            </tr>
          </thead>";
    echo "<tbody>";

    while($produto = $resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$produto['nome']."</td>";
        echo "<td>".$produto['preco']."</td>";
        echo "<td>".$produto['categoria']."</td>";
        echo "<td><img src='". $produto['caminho_imagem'] ."' alt='Imagem do Produto' width='100'></td>";
        echo "<td><div style='padding: 30px;'><a href='VerProduto.php?id=".$produto['id']."' class='botaoAcessar' style=' font-family: Times New Roman;'>ver produto</a></div></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}else{
    echo "<h1 style='font-family: Times New Roman; font-size: 30px;'>Nenhum produto encontrado!</h1>";
}
} else{

$produtos = "SELECT produto.id AS id, produto.nome AS nome, produto.preco AS preco, categoria.nome AS categoria,
             produto.caminho_imagem AS caminho_imagem FROM produto 
             INNER JOIN categoria
             ON categoria.id = produto.id_categoria";
$resultadoTodosProdutos = $con->query($produtos);

if($resultadoTodosProdutos->num_rows>0){
    
    echo"
    
    <table class='table'>
    <thead>
        <tr>
            <th style='font-family: Times New Roman;'>Nome: </th>
            <th style='font-family: Times New Roman;'>Preço: </th>
            <th style='font-family: Times New Roman;'>Categoria: </th>
            <th style='font-family: Times New Roman;'>Imagem: </th>
        </tr>
    </thead>
    
    ";

    echo "<tbody>";

    while($tudo = $resultadoTodosProdutos->fetch_assoc()){

        echo "
        
        <tr>
            <td>".$tudo['nome']."</td>
            <td>".$tudo['preco']."</td>
            <td>".$tudo['categoria']."</td>
            <td><img src='".$tudo['caminho_imagem']."' width = '100'></td>
            <td><div style='padding: 30px;'><a href='VerProduto.php?id=".$tudo['id']."' class='botaoAcessar' style=' font-family: Times New Roman; margin: 30px;'>ver produto</a></div></td>
        </tr>
        
        ";
    }

    echo "</tbody>";


}
    
}

?>

    
</body>
</html>


