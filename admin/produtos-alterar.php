<?php
require_once "config.inc.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);

    $sql = "UPDATE produtos SET 
            nome='$nome', 
            descricao='$descricao', 
            preco='$preco', 
            estoque='$estoque' 
            WHERE id='$id'";

    if(mysqli_query($conexao, $sql)){
        header("Location: ../produtos.php?msg=sucesso");
        exit();
    } else {
        echo "<script>alert('Erro ao atualizar produto: " . mysqli_error($conexao) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../produtos.php");
    exit();
}
?>