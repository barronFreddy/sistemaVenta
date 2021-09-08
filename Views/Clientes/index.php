<?php include "Views/Templates/header.php";?>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-2">
            <button class="btn btn-primary mb-2" type="button" onclick="frmCliente();">Nuevo <i class="fas fa-user-plus"></i></button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Clientes</h4>
                        <div class="data-tables">
                            <table id="tblClientes" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                    <th>#</th>
                                    <th>Carnet de identidad</th>
                                    <th>Nombre completo</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>Estado</th>
                                    <th>acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="nuevoCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmCliente">
                        <div class="login-form-body">
                        <input type="hidden" id="idCliente" name="idCliente">
                            <div class="form-gp">
                                <label for="ci">Carnet de identidad</label>
                                <input type="text" id="ci" name="ci" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="apellidoPaterno">Apellido paterno</label>
                                <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="apellidoMaterno">Apellido materno</label>
                                <input type="text" id="apellidoMaterno" name="apellidoMaterno">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="telefono" name="telefono">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="direccion">Dirección</label>
                                <input type="text" id="direccion" name="direccion" >
                                <div class="text-danger"></div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="btnAccion" type="button" onclick = "registrarCliente(event);"></button>
                                <button class="btn btn-danger" id="btnAccion" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>