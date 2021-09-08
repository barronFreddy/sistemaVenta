<?php include "Views/Templates/header.php";?>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-2">
            <button class="btn btn-primary mb-2" type="button" onclick="frmProducto();">Nuevo <i class="fas fa-user-plus"></i></button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Productos</h4>
                        <div class="data-tables">
                            <table id="tblProductos" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                    <th>#</th>
                                    <th>Codigo</th>
                                    <th>Modelo</th>
                                    <th>Precio Venta</th>
                                    <th>Precio Compra</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                    <th>Linea</th>
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
    <div id="nuevoProducto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
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
                    <form method="post" id="frmProducto">
                        <div class="login-form-body">
                        <input type="hidden" id="idProducto" name="idProducto">
                            <div class="form-gp">
                                <label for="codigo">Codigo</label>
                                <input type="text" id="codigo" name="codigo" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-gp">
                                <label for="modelo">modelo</label>
                                <input type="text" id="modelo" name="modelo" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-gp">
                                        <label for="precioVenta">Precio Venta</label>
                                        <input type="number" id="precioVenta" name="precioVenta" required>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-gp">
                                        <label for="precioCompra">Precio Compra</label>
                                        <input type="number" id="precioCompra" name="precioCompra" required>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-gp">
                                        <select id="marca" class="form-control" name="marca" required>
                                            <?php foreach ($data['marcas'] as $row) { ?>
                                            <option value="<?php echo $row['idMarca'];?>"><?php echo $row['nombreMarca']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-gp">
                                        <select id="categoria" class="form-control" name="categoria" required>
                                            <?php foreach ($data['categorias'] as $row) { ?>
                                            <option value="<?php echo $row['idCategoria'];?>"><?php echo $row['descripcion']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="btnAccion" type="button" onclick = "registrarProducto(event);"></button>
                                <button class="btn btn-danger" id="btnAccion" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>