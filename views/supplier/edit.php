<?php include('views/parts/header.php'); ?>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Criar Fornecedor
            </div>
            <form method="POST" action="index.php?action=supplier_edit&id=<?= $supplier['id'] ?>" class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Fornecedor" value="<?= htmlspecialchars($supplier['name']) ?>">
                            <label for="name">Nome do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Descição do Fornecedor" name="description" id="description"><?= htmlspecialchars($supplier['description']) ?></textarea>
                            <label for="description">Descição do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ do Fornecedor" value="<?= htmlspecialchars($supplier['cnpj']) ?>">
                            <label for="cnpj">CNPJ do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP do Fornecedor" value="<?= htmlspecialchars($supplier['cep']) ?>">
                            <label for="cep">CEP do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" value="<?= htmlspecialchars($supplier['address']) ?>">
                            <label for="address">Endereço</label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Numero" value="<?= htmlspecialchars($supplier['number']) ?>">
                            <label for="number">Numero</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="<?= htmlspecialchars($supplier['city']) ?>">
                            <label for="city">Cidade</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="state" name="state" placeholder="Estado" value="<?= htmlspecialchars($supplier['state']) ?>">
                            <label for="state">Estado</label>
                        </div>
                    </div>
                </div>

                <hr>

                <div>
                    <button type="submit" class="btn btn-success btn-sm">Editar</button>
                </div>
            </form>
        </div>
    </div>
<?php include('views/parts/footer.php'); ?>