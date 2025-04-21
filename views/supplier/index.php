<?php include('views/parts/header.php'); ?>

    <div class="container">
        <br>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'supplier_cnpj_exists'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                CNPJ do fornecedor já existe!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Fornecedor
                <div>
                    <a href="index.php?action=product_index" class="btn btn-primary btn-sm">Area de Produtos</a>
                    <a href="index.php?action=supplier_create" class="btn btn-success btn-sm">Novo Fornecedor</a>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" action="index.php">
                    <input type="hidden" name="action" value="supplier_index">
                    <div class="row">
                        <div class="col">                                
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome do fornecedor">
                                <label for="name">Nome do fornecedor</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">Buscar</button>
                </form>

                <hr>

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
                    <button class="btn btn-danger btn-sm d-none" id="btn-delete-multiple" type="submit">Excluir selecionados</button>
                </form>
            </div>
        </div>
    </div>
<?php include('views/parts/footer.php'); ?>