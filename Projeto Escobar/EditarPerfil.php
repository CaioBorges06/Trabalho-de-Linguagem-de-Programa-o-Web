<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Editar Perfil</title>
</head>
<body style="background-color: navy;">

<?php

include("ConexaoBanco.php");
session_start();


$query = "SELECT * FROM usuario WHERE id = ".$_SESSION['id'];
$resultado = $con->query($query);
$usuario = $resultado->fetch_assoc();

?>

    <div style ='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'>Editar Perfil</h1>
        <p style='font-family: Times New Roman; color: white;'>Preencha os campos abaixo para editar o perfil.</p>
    <form action="AtualizarPerfil.php" method="POST">
        <label for="id" style='font-family: Times New Roman; color: white;'>ID:</label>
        <input type="text" name="id" value="<?php echo $usuario['id']; ?>" readonly><br><br>

        <label for="nome" style='font-family: Times New Roman; color: white;'>Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" ><br><br>

        <label for="email" style='font-family: Times New Roman; color: white;'>Email:</label>
        <input type="email" name="email" id="email" required value="<?php echo $usuario['email'] ;?>"><br><br>

        <label for="senha" style='font-family: Times New Roman; color: white;'>Senha:</label>
        <input type="password" name="senha" id="senha" required value="<?php echo $usuario['senha']; ?>"><br><br>

        <button type="submit" class="btn btn-success" style="font-family: Times New Roman; font-size: 20px;">Atualizar</button><br><br>
        <a href="MeuPerfil.php" class="btn btn-danger" style="font-family: Times New Roman; font-size: 20px;">Cancelar</a>
    </div>
</body>
</html>