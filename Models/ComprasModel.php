<?php
class ComprasModel extends Query{
    public function __construct(){
        parent::__construct();
    }
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
    public function registrarDetalle(int $idProducto, int $idUsuario, string $precio, int $cantidad, string $subTotal)
    {
        $sql = "INSERT INTO detalle(idProducto, idUsuario, precio, cantidad, subTotal) VALUES (?,?,?,?,?)";
        $datos = array($idProducto,$idUsuario,$precio,$cantidad,$subTotal);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
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
        INNER JOIN detalle d ON d.idProducto = p.idProducto WHERE d.idUsuario = $id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function calcularCompra(int $id) 
    {
        $sql = "SELECT subTotal, SUM(subTotal) AS total FROM detalle WHERE idUsuario = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function eliminarDetalle(int $id)
    {
        $sql = "DELETE FROM detalle WHERE idDetalle = ?";
        $datos= array($id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function consultarDetalle(int $idProducto, int $idUsuario)
    {
        $sql = "SELECT * FROM detalle WHERE idProducto = $idProducto AND idUsuario = $idUsuario";
        $data = $this->select($sql);
        return $data;
    }
    public function actualizarDetalle(string $precio, int $cantidad, string $subTotal, int $idProducto, int $idUsuario)
    {
        $sql = "UPDATE detalle SET precio = ?, cantidad = ?, subTotal = ? WHERE idProducto = ? AND idUsuario = ? ";
        $datos = array($precio,$cantidad,$subTotal,$idProducto,$idUsuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    
    public function registrarCompra(string $total)
    {
        $sql = "INSERT INTO compra(total) VALUES (?)";
        $datos = array($total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function idCompra()
    {
        $sql = "SELECT MAX(idCompra) AS id FROM compra";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalleCompra(int $idC, int $idP, int $cantidad, string $precio, string $subTotal)
    {
        $sql = "INSERT INTO detallecompra(idCompra, idProducto, cantidad, precio, subTotal) VALUES (?,?,?,?,?)";
        $datos = array($idC,$idP,$cantidad,$precio,$subTotal);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function vaciarDetalleCompra(int $idUsuario)
    {
        $sql = "DELETE FROM detalle WHERE idUsuario = ?";
        $datos = array($idUsuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getProductosCompra(int $idC)
    {
        $sql = "SELECT co.*, d.*, c.idCategoria, c.descripcion, p.idProducto AS idPro, p.codigo, p.precioCompra FROM productos p 
        INNER JOIN categorias c ON p.idProducto = c.idCategoria 
        INNER JOIN marcas m ON m.idMarca = p.idProducto 
        INNER JOIN detallecompra d ON d.idProducto = p.idProducto 
        INNER JOIN compra co ON co.idCompra = d.idCompra WHERE co.idCompra = $idC";

        $data = $this->selectAll($sql);
        return $data;
    }
    public function getHistorialCompras()
    {
        $sql = "SELECT * FROM compra";
        $data = $this->selectAll($sql);
        return $data;
    }
}