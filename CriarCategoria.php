<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastro de categoria</title>
</head>
<body style="background-color: navy;">
    <div style="text-align: center; padding: 40px;">
        <h1 style="font-family: Times New Roman; font-size: 70px; color: white;">Cadastro de Categoria</h1>
        <p style="font-family: Times New Roman; font-size: 30px; color: white;">Preencha o formulário abaixo para cadastrar uma nova categoria.</p><br><br><br>
        <form action="SalvarCategoria.php" method="POST">
            <label for="nome" style="font-family: Times New Roman; font-size: 30px; color: white;">Nome da Categoria:</label><br><br><br>
            <input type="text" id="nome" name="nome" placeholder="Nome da categoria" style="font-family: Times New Roman; font-size: 30px; border-radius: 10px;"required><br><br><br>
            <button class="botaoSalvar" type="submit" style="border-radius: 10px; font-size: 30px;">cadastrar</button>
        </form><br><br>
        <a href="menu.php" class="botaoCancelar">cancelar</a>
    </div>
</body>
</html>