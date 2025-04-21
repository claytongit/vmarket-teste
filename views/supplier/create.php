<?php include('../parts/header.php'); ?>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Criar Fornecedor
            </div>
            <form method="POST" action="index.php?action=supplier_create" class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Fornecedor">
                            <label for="name">Nome do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Descição do Fornecedor" name="description" id="description"></textarea>
                            <label for="description">Descição do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ do Fornecedor">
                            <label for="cnpj">CNPJ do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP do Fornecedor">
                            <label for="cep">CEP do Fornecedor</label>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="andress" name="andress" placeholder="Endereço">
                            <label for="andress">Endereço</label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Numero">
                            <label for="number">Numero</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
                            <label for="city">Cidade</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="state" name="state" placeholder="Estado">
                            <label for="state">Estado</label>
                        </div>
                    </div>
                </div>

                <hr>

                <div>
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
<?php include('../parts/footer.php'); ?>