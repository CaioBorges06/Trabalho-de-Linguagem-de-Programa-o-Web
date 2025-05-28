<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .linha{

            font-family: Times New Roman; 
            color: white;
            font-size: 30px;

        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login Usuário</title>
</head>
<body style="background-color: navy">
    <div>
        <div style="padding: 30px;">
            <a href="menu.php" class="botaoSalvar" style="margin: 30px;">⬅ Voltar</a>
            </div>
    <div style='text-align: center; padding: 40px;'>
    <h1 style="font-family: Times New Roman; color: white; font-size: 80px">Login</h1>
    <form action="Salvarlogin.php" method="POST">
        <label for="email" class="linha">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="senha" class="linha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <button type="submit" class="botaoSalvar" >Login</button><br><br>
        <p style="font-family: Times New Roman; color: white; font-size: 20px;">Não está logado? <a href="CadastrarUsuario.php" style="font-family: Times New Roman; color: #FFD700"> Fazer Cadastro </a></p>
    </div>
    </div>
</body>
</html>