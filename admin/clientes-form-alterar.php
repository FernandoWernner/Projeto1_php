<?php
require_once 'config.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
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
        $id = $_GET['id'];
        $sql = "SELECT * FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($resultado) > 0){
            while($dados = mysqli_fetch_array($resultado)){
                $nome = $dados['nome'];
                $email = $dados['email'];
                $telefone = $dados['telefone'];
                $endereco = $dados['endereco'];
                $cidade = $dados['cidade'];
                $estado = $dados['estado'];
                $id = $dados['id'];
            }
        ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Editar Cliente</h2>
            <a href="../index.php?pg=clientes" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="form-container">
            <form action="clientes-alterar.php" method="post" class="card-like">
                <input type="hidden" name="id" value="<?=$id?>">

                <div class="form-group mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" value="<?=htmlspecialchars($nome)?>" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" value="<?=htmlspecialchars($email)?>" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Telefone:</label>
                    <input type="text" name="telefone" value="<?=htmlspecialchars($telefone)?>" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Endereço:</label>
                    <textarea name="endereco" class="form-control" rows="3"><?=htmlspecialchars($endereco)?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Cidade:</label>
                    <input type="text" name="cidade" value="<?=htmlspecialchars($cidade)?>" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Estado:</label>
                    <input type="text" name="estado" value="<?=htmlspecialchars($estado)?>" class="form-control" maxlength="2">
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Atualizar Cliente</button>
                    <a href="../index.php?pg=clientes" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>

        <?php
        } else {
            echo '<div class="alert alert-danger">';
            echo '<h4><i class="bi bi-exclamation-triangle-fill"></i> Nenhum cliente encontrado!</h4>';
            echo '</div>';
            echo '<a href="../index.php?pg=clientes" class="btn btn-secondary">Voltar para Lista</a>';
        }
        ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>