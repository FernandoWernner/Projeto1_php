<?php
require_once "config.inc.php";

$sql = "SELECT * FROM produtos ORDER BY criado_em DESC";
$resultado = mysqli_query($conexao, $sql);

// Verificar se a consulta foi bem-sucedida
if ($resultado === false) {
    die("<div class='alert alert-danger'>Erro na consulta: " . mysqli_error($conexao) . "</div>");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dark.css" id="theme-dark" disabled>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Produtos (Admin)</h2>
            <a href="produtos-form.php" class="btn btn-primary">Cadastrar novo produto</a>
        </div>

        <?php if(isset($_GET['msg']) && $_GET['msg'] == 'sucesso'): ?>
            <div class="alert alert-success">Produto atualizado com sucesso!</div>
        <?php endif; ?>

        <?php if(isset($_GET['msg']) && $_GET['msg'] == 'excluido'): ?>
            <div class="alert alert-success">Produto excluído com sucesso!</div>
        <?php endif; ?>

        <?php if(mysqli_num_rows($resultado) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($p = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?=htmlspecialchars($p['nome'])?></td>
                        <td><?=htmlspecialchars($p['descricao'] ?? '')?></td>
                        <td>R$ <?=number_format($p['preco'], 2, ',', '.')?></td>
                        <td><?=$p['estoque']?> unidades</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="produtos-form-alterar.php?id=<?=$p['id']?>" class="btn btn-outline-primary">Editar</a>
                                <a href="produtos-excluir.php?id=<?=$p['id']?>" class="btn btn-outline-danger" onclick="return confirm('Excluir produto?')">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">
                <h4>Nenhum produto cadastrado</h4>
                <p>Clique no botão acima para cadastrar o primeiro produto.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/theme.js"></script>
</body>
</html>