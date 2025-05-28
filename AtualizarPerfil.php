<?php

include("ConexaoBanco.php");
session_start();

$id = $_SESSION['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "UPDATE usuario SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = $id";
$resultado = $con->query($query);

if ($resultado) {
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='MeuPerfil.php';</script>";
} else {
    echo "<script>alert('Erro ao atualizar os dados.'); window.location.href='EditarPerfil.php';</script>";
}


header("Location: MeuPerfil.php");

?>