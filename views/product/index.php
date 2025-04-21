<?php include('../parts/header.php'); ?>

    <div class="container">
        <br>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between align-items-center">
                Produto
                <div>
                    <a href="#" class="btn btn-success btn-sm">Novo Produto</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <form method="GET" action="index.php">
                        <input type="hidden" name="action" value="product_index">
                        <div class="row">
                            <div class="col">                                
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="floatingSelect">Works with selects</label>
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