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
    <div style ='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 70px;'>Cadastrar Usuário</h1>
        <p style='font-family: Times New Roman; color: white;'>Preencha os campos abaixo para criar uma nova conta.</p>
    <form action="SalvarCadastro.php" method="POST">
        <label for="nome" style='font-family: Times New Roman; color: white;'>Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="email" style='font-family: Times New Roman; color: white;'>Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="senha" style='font-family: Times New Roman; color: white;'>Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <button type="submit" class="btn btn-success">Cadastrar</button><br><br>
        <p style='font-family: Times New Roman; color: white;' >Já tem uma conta? <a href="LoginUsuario.php" style='font-family: Times New Roman; color: #FFD700;'>Faça login</a></p>
    </div>
</body>
</html>