<?php include "Views/Templates/header.php";?>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-2">
            <button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();">Nuevo <i class="fas fa-user-plus"></i></button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Usuarios</h4>
                        <div class="table-responsive">
                            <table id="tblUsuarios" class="table table-light">
                                <thead class="bg-light text-capitalize">
                                <?php
                                        $indice=1;
                                    ?>
                                    <tr>
                                    <th>indice</th>
                                    <th>usuario</th>
                                    <th>nombre</th>
                                    <th>apellido</th>
                                    <th>rol</th>
                                    <th>estado</th>
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
    <div id="nuevoUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h3 class="modal-title text-white" id="title"></h3>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--form method="post" id="frmUsuario" action="">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="password" class="form-control" type="password" name="password" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar">Confirmar contraseña</label>
                                    <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="caja">Caja</label>
                            <select id="caja" class="form-control" name="caja">
                                <option></option>
                            </select>
                        </div>
                        <button class="btn btn-primary mb-2" type="button">Guardar</button>
                    </form-->   
                    <form method="post" id="frmUsuario">
                        <div class="login-form-body">
                        <input type="hidden" id="idUsuario" name="idUsuario">
                            <div class="form-gp">
                                <label for="usuario">Nombre Usuario</label>
                                <input type="text" id="usuario" name="usuario" required>
                                <i class="ti-users"></i>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" required>
                                <i class="ti-user"></i>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name="apellido" required>
                                <i class="ti-user"></i>
                                <div class="text-danger"></div>
                            </div>
                            <div class="row" id="claves">
                                <div class="col-md-6">
                                    <div class="form-gp">
                                        <label for="password">Contraseña</label>
                                        <input type="password" id="password" name="password" required>
                                        <i class="ti-lock"></i>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-gp">
                                        <label for="confirmar">Confirmar contraseña</label>
                                        <input type="password" id="confirmar" name="confirmar" required>
                                        <i class="ti-lock"></i>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-gp">
                                    <select id="rol" class="form-control" name="rol" required>
                                        <?php foreach ($data['roles'] as $row) { ?>
                                        <option value="<?php echo $row['idRol'];?>"><?php echo $row['nombreRol']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="submit-btn-area">
                                <button id="btnAccion" type="button" onclick = "registrarUsuario(event);"></button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>