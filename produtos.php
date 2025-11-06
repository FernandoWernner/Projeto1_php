<?php
// Incluir topo primeiro - ISSO CARREGA O CSS!
include_once "topo.php";
?>

<main class="container mt-4">
<?php
require_once "admin/config.inc.php";

// Mostrar mensagens de sucesso
if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if($msg == 'sucesso') {
        echo "<div class='alert alert-success alert-dismissible fade show'>";
        echo "✅ Operação realizada com sucesso!";
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
        echo "</div>";
    } elseif($msg == 'excluido') {
        echo "<div class='alert alert-success alert-dismissible fade show'>";
        echo "✅ Produto excluído com sucesso!";
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
        echo "</div>";
    }
}

$sql = "SELECT * FROM produtos ORDER BY nome";
$resultado = mysqli_query($conexao, $sql);

// Verificar se a consulta foi bem-sucedida
if ($resultado === false) {
    echo "<div class='alert alert-danger'>";
    echo "<h4>Erro na consulta ao banco de dados</h4>";
    echo "<p>" . mysqli_error($conexao) . "</p>";
    echo "</div>";
} else {
    if (mysqli_num_rows($resultado) > 0) {
        echo "<div class='d-flex justify-content-between align-items-center mb-4'>";
        echo "<h2>Nossos Produtos</h2>";
        echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalNovoProduto'>Novo Produto</button>";
        echo "</div>";
        ?>
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
                <?php
                    while($dados = mysqli_fetch_array($resultado)) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($dados['nome']) ?></td>
                    <td><?= htmlspecialchars($dados['descricao'] ?? 'Sem descrição') ?></td>
                    <td>R$ <?= number_format($dados['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($dados['estoque']) ?> unidades</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" 
                                    onclick="carregarDadosEdicao(
                                        '<?= $dados['id'] ?>',
                                        '<?= htmlspecialchars($dados['nome']) ?>',
                                        `<?= htmlspecialchars($dados['descricao'] ?? '') ?>`,
                                        '<?= $dados['preco'] ?>',
                                        '<?= $dados['estoque'] ?>'
                                    )">
                                Editar
                            </button>
                            <button class="btn btn-outline-danger" 
                                    onclick="confirmarExclusao(
                                        '<?= $dados['id'] ?>',
                                        '<?= htmlspecialchars($dados['nome']) ?>'
                                    )">
                                Excluir
                            </button>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "<div class='text-center py-5'>";
        echo "<h2>Nenhum Produto Cadastrado</h2>";
        echo "<p class='text-muted'>Não há produtos cadastrados no sistema.</p>";
        echo "<button class='btn btn-primary mt-3' data-bs-toggle='modal' data-bs-target='#modalNovoProduto'>Cadastrar Primeiro Produto</button>";
        echo "</div>";
    }
    
    // Fechar conexão
    mysqli_close($conexao);
}
?>

<!-- Modal para Novo Produto -->
<div class="modal fade" id="modalNovoProduto" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Novo Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="formNovoProduto" action="admin/produtos-cadastro.php" method="post">
          <div class="mb-3">
            <label class="form-label">Nome do Produto:</label>
            <input type="text" name="nome" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <textarea name="descricao" class="form-control" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Preço (R$):</label>
            <input type="number" name="preco" step="0.01" min="0" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Estoque:</label>
            <input type="number" name="estoque" min="0" class="form-control" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" form="formNovoProduto" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Editar Produto -->
<div class="modal fade" id="modalEditarProduto" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="formEditarProduto" action="admin/produtos-alterar.php" method="post">
          <input type="hidden" name="id" id="editId">
          <div class="mb-3">
            <label class="form-label">Nome do Produto:</label>
            <input type="text" name="nome" id="editNome" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <textarea name="descricao" id="editDescricao" class="form-control" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Preço (R$):</label>
            <input type="number" name="preco" id="editPreco" step="0.01" min="0" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Estoque:</label>
            <input type="number" name="estoque" id="editEstoque" min="0" class="form-control" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" form="formEditarProduto" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Script para os modals -->
<script>
// Função para carregar dados no modal de edição
function carregarDadosEdicao(id, nome, descricao, preco, estoque) {
    document.getElementById('editId').value = id;
    document.getElementById('editNome').value = nome;
    document.getElementById('editDescricao').value = descricao;
    document.getElementById('editPreco').value = preco;
    document.getElementById('editEstoque').value = estoque;
    
    // Abrir o modal
    var modal = new bootstrap.Modal(document.getElementById('modalEditarProduto'));
    modal.show();
}

// Função para confirmar exclusão
function confirmarExclusao(id, nome) {
    if(confirm('Tem certeza que deseja excluir o produto "' + nome + '"?')) {
        window.location.href = 'admin/produtos-excluir.php?id=' + id;
    }
}
</script>

<?php
// Incluir rodapé - ISSO CARREGA OS SCRIPTS JS!
include_once "rodape.php";
?>