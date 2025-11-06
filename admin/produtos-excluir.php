<?php
require_once "config.inc.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM produtos WHERE id = '$id'";
    
    if(mysqli_query($conexao, $sql)) {
        header("Location: ../produtos.php?msg=excluido");
        exit();
    } else {
        header("Location: ../produtos.php?msg=erro");
        exit();
    }
} else {
    header("Location: ../produtos.php");
    exit();
}
?>