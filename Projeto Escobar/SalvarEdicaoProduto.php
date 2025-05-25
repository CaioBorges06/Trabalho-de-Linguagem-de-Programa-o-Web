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

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    // Se a imagem foi enviada corretamente
    $nomeArquivo = $_FILES['imagem']['name'];
    $caminhoTemporario = $_FILES['imagem']['tmp_name'];
    $caminhoFinal = "uploads/" . $nomeArquivo;
    move_uploaded_file($caminhoTemporario, $caminhoFinal); // Move a imagem para o diretório de uploads
} else {
    // Caso não tenha sido enviado nenhum arquivo, mantém a imagem atual
    $caminhoFinal = $_POST['caminho_atual'];
}

$query = "UPDATE produto SET nome = '$nome', preco = '$preco', categoria = '$categoria', caminho_imagem = '$caminhoFinal' WHERE id = '$id'";
$resultado = $con->query($query);

if ($resultado) {
    echo "
    <div style='text-align: center; padding: 40px; align-items: center;'>
        <h1 style='font-family: Times New Roman; font-size: 70px; color: white;'>Produto editado com sucesso!</h1><br><br>
        <a href='MeusProdutos.php' class='btn btn-primary' style='font-size: 40px; font-family: Times New Roman;'>⬅️ Voltar aos Meus Produtos</a>
    </div> 
    ";

} else {
    echo "<h1>Erro ao editar produto!</h1><br><br>";
    echo "<a href='MeusProdutos.php' class='btn btn-primary'>Voltar aos Meus Produtos</a>";
}
?>

</body>
</html>