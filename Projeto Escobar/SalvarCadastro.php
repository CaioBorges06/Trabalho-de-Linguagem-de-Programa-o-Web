<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Salvar Cadastro</title>
</head>
<body style="background-color: navy;">
    <?php 

include("ConexaoBanco.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$select = "SELECT * FROM usuario WHERE email = '$email'";
$resultado_select = $con->query($select);

if($resultado_select->num_rows == 0){
    
    $query = "INSERT INTO usuario(nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $resultado = $con->query($query);
    $select2 = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado_select2 = $con->query($select2);
    $usuario = $resultado_select2->fetch_assoc();
    session_start();
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['senha'] = $usuario['senha'];
    echo "
        <div style='text-align: center; padding: 40px;'>
            <h1 style='font-family: Times New Roman; color: white; font-size: 70px;'>Cadastro realizado com sucesso!</h1>
            <a href ='menu.php' class='btn btn-success' style='font-size: 40px; font-family: Times New Roman;'>Voltar ao Menu</a>
        </div>
    ";
}else{
        echo "
            <div style='text-align: center; padding: 40px;'>
                <h1 style='font-family: Times New Roman; color: white; font-size: 70px'>Erro ao cadastrar!</h1><br>
                <p style='font-family: Times New Roman; color: white; font-size: 30px'>Esse email provavelmente já foi cadastrado</p><br>
                <a href ='menu.php' class='btn btn-success' style='font-size: 40px; font-family: Times New Roman;'>⬅️ Voltar ao Menu</a>
                <a href ='LoginUsuario.php' class='btn btn-success' style='font-size: 40px; font-family: Times New Roman; margin: 10px;'>↪ Fazer Login</a>
            </div>
        
             ";
    }

?>
</body>
</html>




