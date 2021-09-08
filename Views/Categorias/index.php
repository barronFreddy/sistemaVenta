<?php include "Views/Templates/header.php";?>
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-2">
            <button class="btn btn-primary mb-2" type="button" onclick="frmCategoria();">Nuevo <i class="fas fa-user-plus"></i></button>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Categorias</h4>
                        <div class="data-tables">
                            <table id="tblCategorias" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
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
    <div id="nuevaCategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmCategoria">
                        <div class="login-form-body">
                        <input type="hidden" id="idCategoria" name="idCategoria">
                            <div class="form-gp">
                                <label for="descripcion">Ingrese la Categoria</label>
                                <input type="text" id="descripcion" name="descripcion" required>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-gp">
                                        <select id="linea" class="form-control" name="linea" required>
                                            <option>Linea blanca</option>
                                            <option>Linea marron</option>
                                        </select>
                                    </div>
                                </div>
                            
                            <div class="submit-btn-area">
                                <button id="btnAccion" type="button" onclick = "registrarCategoria(event);"></button>
                                <button class="btn btn-danger" id="btnAccion" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>