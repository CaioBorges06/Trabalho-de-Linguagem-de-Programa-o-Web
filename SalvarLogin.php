<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Salvar Login</title>
</head>
<body style="background-color: navy;">
    <?php 

include("ConexaoBanco.php");

$email = $_POST['email'];
$senha = $_POST['senha'];


$query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
$resultado = $con->query($query);

if($resultado->num_rows == 1){
    $usuario = $resultado->fetch_assoc();
    echo "
        <div style='text-align: 0px; padding: 40px; text-align: center;'>
            <h1 style='font-family: Times New Roman; font-size: 70px; color: white;'>Login realizado com sucesso!<h1><br><br>
            <tr><td><a href ='menu.php' class='botaoSalvar' style='font-size: 40px; font-family: Times New Roman;'>Voltar ao Menu</a></td></tr>
        </div>";
   
    session_start();
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['senha'] = $usuario['senha'];
}else{
    echo "
    <div style='text-align: center; padding: 60px;'>
        <h1 style='font-size: 70px; color: white; font-family: Times New Roman;'>Erro ao logar!</h1><br><br>
        <a href='LoginUsuario.php' class = 'botaoSalvar' >↩ Tentar Novamente</a><br><br><br>
        <a href='menu.php' class = 'botaoCancelar'>❌ Cancelar</a>
    </div>
        ";
}

?>
</body>
</html>



