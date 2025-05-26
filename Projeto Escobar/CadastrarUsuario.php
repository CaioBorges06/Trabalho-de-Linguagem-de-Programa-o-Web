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
    <title>Cadastro usuário</title>
</head>
<body style="background-color: navy;">
    <div>
        <div style="padding: 30px;">
            <a href="menu.php" class="botaoSalvar">⬅ Voltar</a>
            </div>
    <div style ='text-align: center; padding: 40px;'>
        <h1 style='font-family: Times New Roman; color: white; margin: 0; font-size: 80px;'>Cadastrar Usuário</h1>
        <p style='font-family: Times New Roman; color: white; font-size: 20px;'>Preencha os campos abaixo para criar uma nova conta.</p>
    <form action="SalvarCadastro.php" method="POST">
        <label for="nome" class="linha">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="email" class="linha">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="senha" class="linha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <button type="submit" class="botaoSalvar" style="border-radius: 10px;" >Cadastrar</button><br><br>
        <p style='font-family: Times New Roman; color: white; font-size: 20px;' >Já tem uma conta? <a href="LoginUsuario.php" style='font-family: Times New Roman; color: #FFD700; font-size: 20px;'>Faça login</a></p>
    </div>
    </div>
</body>
</html>