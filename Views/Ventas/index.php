<?php include "Views/Templates/header.php";?>
<div class="container-fluid mt-2">
    <div class="card">
        <div class="card-header bg-secondary text-white"> 
            <h9>Nueva Venta</h9>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="codigo"><i class="fas fa-users"></i> Datos del cliente</label>
            <form id="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cliente">Seleciona un cliente</label>
                            <select id="cliente" class="form-control" name="cliente">
                                <?php foreach($data as $row) {?>
                                <option value="<?php echo $row['idCliente'];?>"><?php echo $row['nombreCompleto']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- clientes-->
        <div class="col-md-10">
            <label for="codigo"><i class="fas fa-cart-arrow-down"></i> Datos del producto</label>
            <form id="frmVenta">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="codigo"><i class="fas fa-barcode"></i> Codigo</label>
                        <input type="hidden" id="idProducto" name="idProducto">
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese el codigo" onkeyup="buscarCodigoVenta(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="nombre">Descripcion del producto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Descripcion" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" disabled onkeyup="calcularPrecioVenta(event)">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label for="subTotal">sub total</label>
                        <input type="number" name="subTotal" id="subTotal" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tblDetalleVenta">
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-4 ml-auto">
        <div class="form-group">
          <label for="precio" class = "font-weight-bold">total</label>
          <input type="number" name="total" id="total" class="form-control" disabled>
          <button class="btn btn-success mt-2 btn-block" type="button" onclick="generarVenta()">generar</button>
        </div>
    </div>
</div>
</div>
    
<?php include "Views/Templates/footer.php";?>