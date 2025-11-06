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
        echo "✅ Cliente excluído com sucesso!";
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
        echo "</div>";
    }
}

$sql = "SELECT * FROM clientes ORDER BY nome";
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
        echo "<h2>Nossos Clientes</h2>";
        echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalNovoCliente'>Novo Cliente</button>";
        echo "</div>";
        ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($dados = mysqli_fetch_array($resultado)) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($dados['nome']) ?></td>
                    <td><?= htmlspecialchars($dados['email'] ?? 'Não informado') ?></td>
                    <td><?= htmlspecialchars($dados['telefone'] ?? 'Não informado') ?></td>
                     <td><?= htmlspecialchars($dados['endereco'] ?? 'Não informado') ?></td>
                    <td><?= htmlspecialchars($dados['cidade']) ?></td>
                    <td><?= htmlspecialchars($dados['estado']) ?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" 
                                    onclick="carregarDadosEdicaoCliente(
                                        '<?= $dados['id'] ?>',
                                        '<?= htmlspecialchars($dados['nome']) ?>',
                                        '<?= htmlspecialchars($dados['email'] ?? '') ?>',
                                        '<?= htmlspecialchars($dados['telefone'] ?? '') ?>',
                                        '<?= htmlspecialchars($dados['endereco'] ?? '') ?>',
                                        '<?= htmlspecialchars($dados['cidade']) ?>',
                                        '<?= htmlspecialchars($dados['estado']) ?>'
                                    )">
                                Editar
                            </button>
                            <button class="btn btn-outline-danger" 
                                    onclick="confirmarExclusaoCliente(
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
        echo "<h2>Nenhum Cliente Cadastrado</h2>";
        echo "<p class='text-muted'>Não há clientes cadastrados no sistema.</p>";
        echo "<button class='btn btn-primary mt-3' data-bs-toggle='modal' data-bs-target='#modalNovoCliente'>Cadastrar Primeiro Cliente</button>";
        echo "</div>";
    }
    
    // Fechar conexão
    mysqli_close($conexao);
}
?>

<!-- Modal para Novo Cliente -->
<div class="modal fade" id="modalNovoCliente" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Novo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="formNovoCliente" action="admin/clientes-cadastro.php" method="post">
          <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" name="telefone" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Endereço:</label>
            <textarea name="endereco" class="form-control" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Cidade:</label>
            <input type="text" name="cidade" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Estado:</label>
            <input type="text" name="estado" class="form-control" maxlength="2" placeholder="SP">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" form="formNovoCliente" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Editar Cliente -->
<div class="modal fade" id="modalEditarCliente" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="formEditarCliente" action="admin/clientes-alterar.php" method="post">
          <input type="hidden" name="id" id="editClienteId">
          <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" id="editClienteNome" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" id="editClienteEmail" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" name="telefone" id="editClienteTelefone" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Endereço:</label>
            <textarea name="endereco" id="editClienteEndereco" class="form-control" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Cidade:</label>
            <input type="text" name="cidade" id="editClienteCidade" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Estado:</label>
            <input type="text" name="estado" id="editClienteEstado" class="form-control" maxlength="2">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" form="formEditarCliente" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Script para os modals de clientes -->
<script>
// Função para carregar dados no modal de edição de cliente
function carregarDadosEdicaoCliente(id, nome, email, telefone, endereco, cidade, estado) {
    document.getElementById('editClienteId').value = id;
    document.getElementById('editClienteNome').value = nome;
    document.getElementById('editClienteEmail').value = email;
    document.getElementById('editClienteTelefone').value = telefone;
    document.getElementById('editClienteEndereco').value = endereco;
    document.getElementById('editClienteCidade').value = cidade;
    document.getElementById('editClienteEstado').value = estado;
    
    // Abrir o modal
    var modal = new bootstrap.Modal(document.getElementById('modalEditarCliente'));
    modal.show();
}

// Função para confirmar exclusão de cliente
function confirmarExclusaoCliente(id, nome) {
    if(confirm('Tem certeza que deseja excluir o cliente "' + nome + '"?')) {
        window.location.href = 'admin/clientes-excluir.php?id=' + id;
    }
}
</script>

<?php
// Incluir rodapé
include_once "rodape.php";
?>