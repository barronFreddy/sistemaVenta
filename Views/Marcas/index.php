<?php include "Views/Templates/header.php";?>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-2">
            <button class="btn btn-primary mb-2" type="button" onclick="frmMarca();">Nuevo <i class="fas fa-user-plus"></i></button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Marcas</h4>
                        <div class="data-tables">
                            <table id="tblMarcas" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                    <th>#</th>
                                    <th>Marca</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="nuevaMarca" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmMarca">
                        <div class="login-form-body">
                        <input type="visible" id="idMarca" name="idMarca">
                            <div class="form-gp">
                                <label for="nombreMarca">Ingrese la marca</label>
                                <input type="text" id="nombreMarca" name="nombreMarca" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="btnAccion" type="button" onclick = "registrarMarca(event);"></button>
                                <button class="btn btn-danger" id="btnAccion" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>