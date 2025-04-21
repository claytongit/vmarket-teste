<?php include('../parts/header.php'); ?>

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
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>@social</td>
                            </tr>
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
<?php include('../parts/footer.php'); ?>