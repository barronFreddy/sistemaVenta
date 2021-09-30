<?php include "Views/Templates/header.php";?>
<div class="container-fluid mt-2">
    <div class="card">
        <div class="card-header bg-primary text-white"> 
            <h4>Nueva Compra</h4>
        </div>
        <div class="card-body">
            <form id="frmCompra">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="codigo"><i class="fas fa-barcode"></i>Cod. del producto</label>
                          <input type="hidden" id="idCompra" name="idCompra">
                          <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese el codigo" onkeyup="buscarCodigo(event)">
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
                          <input type="number" name="cantidad" id="cantidad" class="form-control" disabled onkeyup="calcularPrecio(event)">
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
            <th>#</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tblDetalle">

    </tbody>
</table>
<div class="row">
    <div class="col-md-4 ml-auto">
        <div class="form-group">
          <label for="precio" class = "font-weight-bold">total</label>
          <input type="number" name="total" id="total" class="form-control" disabled>
          <button class="btn btn-success mt-2 btn-block" type="button" onclick="generarCompra()">generar</button>
        </div>
    </div>
</div>
</div>
<?php include "Views/Templates/footer.php";?>