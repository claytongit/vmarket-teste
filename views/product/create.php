<?php include('../parts/header.php'); ?>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Criar Produto
            </div>
            <form method="POST" action="index.php?action=product_create" class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Produto">
                            <label for="name">Nome do produto</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input type="float" class="form-control" id="price" name="price" placeholder="Valor do Produto">
                            <label for="price">Valor do produto</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Descição do Produto" name="description" id="description"></textarea>
                            <label for="description">Descição do Produto</label>
                        </div>
                    </div>
                </div>

                <hr>

                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                        <label class="form-check-label" for="checkDefault">
                            Default checkbox
                        </label>
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