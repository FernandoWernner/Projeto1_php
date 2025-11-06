<form action="produtos-alterar.php" method="post" class="card-like">
    <input type="hidden" name="id" value="<?=$id?>">

    <div class="form-group mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" value="<?=$nome?>" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Descrição:</label>
        <textarea name="descricao" class="form-control"><?=$descricao?></textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?=$preco?>" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Estoque:</label>
        <input type="number" name="estoque" value="<?=$estoque?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Produto</button>
    <a href="produtos.php" class="btn btn-secondary">Cancelar</a>
</form>