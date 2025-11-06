<?php
require_once "config.inc.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Seu CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Tema escuro -->
    <link rel="stylesheet" href="../css/dark.css" id="theme-dark" disabled>
</head>
<body>
    <div class="container mt-4">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
            $email = mysqli_real_escape_string($conexao, $_POST["email"]);
            $telefone = mysqli_real_escape_string($conexao, $_POST["telefone"]);
            $endereco = mysqli_real_escape_string($conexao, $_POST["endereco"]);
            $cidade = mysqli_real_escape_string($conexao, $_POST["cidade"]);
            $estado = mysqli_real_escape_string($conexao, $_POST["estado"]);

            $sql = "INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado)
                    VALUES ('$nome', '$email', '$telefone', '$endereco', '$cidade', '$estado')";
            
            if(mysqli_query($conexao, $sql)){
                echo '<div class="alert alert-success">';
                echo '<h4><i class="bi bi-check-circle-fill"></i> Cliente cadastrado com sucesso!</h4>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger">';
                echo '<h4><i class="bi bi-exclamation-triangle-fill"></i> Erro ao cadastrar cliente!</h4>';
                echo '<p>' . mysqli_error($conexao) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-warning">';
            echo '<h4><i class="bi bi-exclamation-circle-fill"></i> Acesso negado!</h4>';
            echo '<p>Esta página deve ser acessada através do formulário de cadastro.</p>';
            echo '</div>';
        }
        ?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <a href="clientes-form.php" class="btn btn-primary me-2">Cadastrar Outro Cliente</a>
            <a href="../index.php?pg=clientes" class="btn btn-success">Ver Lista de Clientes</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>