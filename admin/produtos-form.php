<form action="produtos-cadastro.php" method="post" class="card-like">
    <div class="form-group mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Descrição:</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Preço:</label>
        <input type="number" name="preco" step="0.01" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Estoque:</label>
        <input type="number" name="estoque" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Produto</button>
    <a href="produtos-admin.php" class="btn btn-secondary">Cancelar</a>
</form>