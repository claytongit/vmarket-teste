<?php include('views/parts/header.php'); ?>

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Produto
                <div>
                    <a href="index.php?action=product_create" class="btn btn-success btn-sm">Novo Produto</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <form method="GET" action="index.php">
                        <input type="hidden" name="action" value="product_index">
                        <div class="row">
                            <div class="col">                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome do produto">
                                    <label for="name">Nome do produto</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" name="supplier_id" aria-label="Fornecedor">
                                        <option selected disabled>-- Fornecedor --</option>
                                        <?php foreach ($suppliers as $f): ?>
                                            <option value="<?= $f['id'] ?>"><?= htmlspecialchars($f['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="floatingSelect">Fornecedores</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Buscar</button>
                    </form>
                </div>

                <hr>

                <form method="POST" action="index.php?action=product_delete_multiple">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" onclick="toggleAll(this)"></th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Fornecedores</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p): ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $p['id'] ?>"></td>
                                    <td><?= htmlspecialchars($p['name']) ?></td>
                                    <td><?= htmlspecialchars('R$ ' . number_format($p['price'], 2, ',', '.')) ?></td>
                                    <td><?= htmlspecialchars($p['suppliers']) ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="index.php?action=product_edit&id=<?= $p['id'] ?>">Editar</a>
                                        <a class="btn btn-danger btn-sm" href="index.php?action=product_delete&id=<?= $p['id'] ?>">Deletar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button class="btn btn-danger btn-sm" type="submit">Excluir selecionados</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function toggleAll(source) {
            document.querySelectorAll('input[type=checkbox]').forEach(cb => cb.checked = source.checked);
        }
    </script>
<?php include('views/parts/footer.php'); ?>