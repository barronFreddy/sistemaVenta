<?php
class VentasModel extends Query{
    public function __construct(){
        parent::__construct();
    }
    #region ventas Cliente
    public function getClientes()
    {
        $sql = "SELECT idCliente, ci, concat(nombre,' ', apellidoPaterno,' ', apellidoMaterno)AS nombreCompleto, telefono, direccion, estado FROM clientes WHERE estado != 0";
        $data = $this->selectAll($sql);
        return $data;
    }
#endregion
    #region Venta Producto
    public function buscarProductoCodigo(string $codigo){
        $sql = "SELECT  m.*, c.*, p.* 
        FROM productos p 
        INNER JOIN categorias c ON p.idProducto = c.idCategoria 
        INNER JOIN marcas m ON m.idMarca = p.idProducto WHERE p.codigo = '$codigo'";
        $data = $this->select($sql);
        return $data;
    }
    public function getProductos(int $id)
    {
        $sql = "SELECT m.*, c.*, p.* 
        FROM productos p 
        INNER JOIN categorias c ON p.idProducto = c.idCategoria 
        INNER JOIN marcas m ON m.idMarca = p.idProducto 
        WHERE p.idProducto = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function consultarDetalleVenta(int $idProducto, int $idUsuario)
    {
        $sql = "SELECT * FROM detalletempventa WHERE idProducto = $idProducto AND idUsuario = $idUsuario";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalle(int $idProducto, int $idUsuario, string $precio, int $cantidad, string $subTotal)
    {
        $sql = "INSERT INTO detalletempventa(idProducto, idUsuario, precio, cantidad, subTotal) VALUES (?,?,?,?,?)";
        $datos = array($idProducto,$idUsuario,$precio,$cantidad,$subTotal);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function actualizarDetalleVenta(string $precio, int $cantidad, string $subTotal, int $idProducto, int $idUsuario)
    {
        $sql = "UPDATE detalletempventa SET precio = ?, cantidad = ?, subTotal = ? WHERE idProducto = ? AND idUsuario = ?";
        $datos = array($precio,$cantidad,$subTotal,$idProducto,$idUsuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getDetalle(int $id) 
    {
        $sql = "SELECT d.*, m.idMarca, m.nombreMarca, c.idCategoria, c.descripcion, p.idProducto AS idPro, p.codigo, p.precioCompra
        FROM productos p
        INNER JOIN categorias c ON p.idProducto = c.idCategoria 
        INNER JOIN marcas m ON m.idMarca = p.idProducto
        INNER JOIN detalletempventa d ON d.idProducto = p.idProducto WHERE d.idUsuario = $id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function calcularVenta(int $id) 
    {
        $sql = "SELECT subTotal, SUM(subTotal) AS total FROM detalletempventa WHERE idUsuario = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function eliminarDetalle(int $id)
    {
        $sql = "DELETE FROM detalletempventa WHERE id = ?";
        $datos= array($id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function registrarVenta(int $idCliente, string $total)
    {
        $sql = "INSERT INTO venta(idCliente,total) VALUES (?,?)";
        $datos = array($idCliente, $total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function idVenta()
    {
        $sql = "SELECT MAX(idVenta) AS id FROM venta";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalleVenta(int $idV, int $idP, int $cantidad, string $precio, string $subTotal)
    {
        $sql = "INSERT INTO detalleventa(idVenta, idProducto, cantidad, precio, subTotal) VALUES (?,?,?,?,?)";
        $datos = array($idV,$idP,$cantidad,$precio,$subTotal);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function vaciarDetalleVenta(int $idUsuario)
    {
        $sql = "DELETE FROM detalletempventa WHERE idUsuario = ?";
        $datos = array($idUsuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getProductosVenta(int $idV)
    {
        $sql = "SELECT v.*, d.*, c.idCategoria, c.descripcion, p.idProducto AS idPro, p.codigo, p.precioCompra, cl.idCliente AS id, CONCAT(cl.nombre,' ', cl.apellidoPaterno,' ', cl.apellidoMaterno)AS nombreCompleto, cl.telefono, cl.direccion, cl.estado
        FROM productos p 
                INNER JOIN categorias c ON p.idProducto = c.idCategoria 
                INNER JOIN marcas m ON m.idMarca = p.idProducto 
                INNER JOIN detalleventa d ON d.idProducto = p.idProducto 
                INNER JOIN venta v ON v.idVenta = d.idVenta
                INNER JOIN clientes cl ON cl.idCliente = v.idCliente WHERE v.idVenta = $idV";

        $data = $this->selectAll($sql);
        return $data;
    }
    public function actualizarStock(int $cantidad,int $idProducto)
    {
        $sql = "UPDATE productos SET stock = ? WHERE idProducto = ?";
        $datos = array($cantidad,$idProducto);
        $data = $this->save($sql,$datos);
        return $data;
    }
    
    public function getHistorialVentas()
    {
        $sql = "SELECT v.*, c.idCliente AS id, CONCAT(c.nombre,' ', c.apellidoPaterno,' ', c.apellidoMaterno)AS nombreCompleto, c.telefono, c.direccion, c.estado
        FROM venta v 
        INNER JOIN clientes c ON v.idCliente = c.idCliente WHERE c.estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    #endregion
}