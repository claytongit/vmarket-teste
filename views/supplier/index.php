<?php include('views/parts/header.php'); ?>

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Fornecedor
                <div>
                    <a href="index.php?action=product_index" class="btn btn-primary btn-sm">Area de Produtos</a>
                    <a href="index.php?action=supplier_create" class="btn btn-success btn-sm">Novo Fornecedor</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?action=supplier_delete_multiple">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" onclick="toggleAll(this)"></th>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>Cidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($suppliers as $f): ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $f['id'] ?>"></td>
                                    <td><?= htmlspecialchars($f['name']) ?></td>
                                    <td><?= htmlspecialchars($f['cnpj']) ?></td>
                                    <td><?= htmlspecialchars($f['city']) ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="index.php?action=supplier_edit&id=<?= $f['id'] ?>">Editar</a>
                                        <a class="btn btn-danger btn-sm" href="index.php?action=supplier_delete&id=<?= $f['id'] ?>">Excluir</a>
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