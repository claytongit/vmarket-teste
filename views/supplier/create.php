<?php include('views/parts/header.php'); ?>
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
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço">
                            <label for="address">Endereço</label>
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
<?php include('views/parts/footer.php'); ?>
<script>
    $(document).ready(function(){
        $('#cnpj').mask('00.000.000/0000-00');
        $('#cep').mask('00000-000',{
            onComplete: function(cep) {
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {
                    if (!("erro" in data)) {
                        $("#address").val(data.logradouro);
                        $("#city").val(data.localidade);
                        $("#state").val(data.uf);
                        $('#number').focus();
                    } else {
                        $("#address").val("");
                        $("#city").val("");
                        $("#state").val("");
                    }
                });
            }
        });
    });
</script>
