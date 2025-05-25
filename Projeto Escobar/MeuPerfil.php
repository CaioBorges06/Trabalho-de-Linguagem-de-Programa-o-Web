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

    echo"
    
        <div style='display: flex; justify-content: center; align-items: center; position: relative; padding: 20px; background-color: navy;'>
    <div style='position: absolute; left: 0;'>
        <a href='menu.php' class='btn btn-primary' style='font-family: Times New Roman; font-size: 40px;'>⬅️ Voltar ao Menu</a>
    </div>


    <h1 style='font-family: Times New Roman; margin: 0; font-size: 50px; color: white; padding-bottom: 30px';>Meu Perfil</h1>
</div><br><br>

<div style='display: flex; justify-content: center;'>
    <div style='text-align: left; background-color:rgb(33, 64, 235); padding: 20px; border-radius: 30px; width: 50%;'>
        <h2 style='font-family: Times New Roman; font-size: 40px; color: white;'>ID: ".$_SESSION['id']."</h2><br>
        <h2 style='font-family: Times New Roman; font-size: 40px; color: white;'>Nome: ". $_SESSION['nome'] ."</h2><br>
        <h2 style='font-family: Times New Roman; font-size: 40px; color: white;'>Email: ".  $_SESSION['email'] ."</h2><br>
        <h2 style='font-family: Times New Roman; font-size: 40px; color: white;'>Senha: ". $_SESSION['senha']."</h2><br> 
    </div>
</div>
<div style='text-align: center;'>
    <a href='EditarPerfil.php' class='btn btn-primary' style='margin: 20px; font-size: 40px; border-radius: 30px;' >✏️ Editar dados</a>
    <form action='MeuPerfil.php' method='POST'>
        <button type='submit' name='apagar' class='btn btn-danger' style='margin: 20px; font-size: 40px; border-radius: 30px;'>🗑️ Apagar Conta</button><br><br>
</div>
    
    ";

    if(isset($_POST['apagar'])){
        echo"
            <div style='text-align: center; '>
                <p style='color: black; font-family: Times New Roman; font-size: 20px;'>Tem certeza que deseja apagar sua conta? </p>
                <a href='ApagarConta.php' style='font-family: Times New Roman; color: red; font-size: 20px;'>Sim, desejo apagar minha conta.</a>
            </div>
        ";
    }
    
    
    
    ?>
</body>
</html>