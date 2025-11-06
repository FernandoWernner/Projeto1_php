<?php
require_once "config.inc.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM clientes WHERE id = '$id'";
    
    if(mysqli_query($conexao, $sql)) {
        header("Location: ../clientes.php?msg=excluido");
        exit();
    } else {
        header("Location: ../clientes.php?msg=erro");
        exit();
    }
} else {
    header("Location: ../clientes.php");
    exit();
}
?>