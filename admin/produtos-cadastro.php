<?php
require_once "config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conexao, $_POST["descricao"]);
    $preco = mysqli_real_escape_string($conexao, $_POST["preco"]);
    $estoque = mysqli_real_escape_string($conexao, $_POST["estoque"]);

    $sql = "INSERT INTO produtos (nome, descricao, preco, estoque)
            VALUES ('$nome', '$descricao', '$preco', '$estoque')";
    
    if(mysqli_query($conexao, $sql)){
        header("Location: ../produtos.php?msg=sucesso");
        exit();
    } else {
        echo "<script>alert('Erro ao cadastrar produto: " . mysqli_error($conexao) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../produtos.php");
    exit();
}
?>