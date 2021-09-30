<?php include "Views/Templates/header.php";?>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-2">
            <button class="btn btn-primary mb-2" type="button" onclick="frmProveedor();">Nuevo <i class="fas fa-user-plus"></i></button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Proveedores</h4>
                        <div class="table-responsive">
                            <table id="tblProveedor"class="table table-light">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                    <th>#</th>
                                    <th>C.I. o NIT</th>
                                    <th>Tipo Persona</th>
                                    <th>Nombre completo</th>
                                    <th>Nombre Empresa</th>
                                    <th>Dirección</th>
                                    <th>Telefono</th>
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
    <div id="nuevoProveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmProveedor">
                        <div class="login-form-body">
                        <input type="hidden" id="idProveedor" name="idProveedor">
                            <div class="form-gp">
                                <label for="ci">Carnet de identidad o NIT</label>
                                <input type="text" id="ci" name="ci" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-gp">
                                    <select id="tipoPersona" class="form-control" name="tipoPersona" required>
                                        <option >Persona Natural</option>
                                        <option >Persona Juridica</option>
                                    </select>
                                </div>
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
                                <label for="nombreEmpresa">Nombre de la empresa</label>
                                <input type="text" id="nombreEmpresa" name="nombreEmpresa">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="direccion">Direccion</label>
                                <input type="text" id="direccion" name="direccion" >
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="telefono" name="telefono">
                                <div class="text-danger"></div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="btnAccion" type="button" onclick = "registrarProveedor(event);"></button>
                                <button class="btn btn-danger" id="btnAccion" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>