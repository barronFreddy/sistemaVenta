<?php
class ProductosModel extends Query{

    private $codigo,$modelo,$stock,$precioVenta,$precioCompra,$idMarca,$idCategoria,$idProducto,$estado, $idUsuario;
    public function __construct()
    {
        parent::__construct();
    }
    public function getProductos()
    {
        $sql = "SELECT m.*, c.*,p.*
        FROM productos p 
        INNER JOIN categorias c ON p.idProducto = c.idCategoria 
        INNER JOIN marcas m ON m.idMarca = p.idProducto";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getMarcas()
    {
        $sql = "SELECT * FROM marcas WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarProductos(string $codigo, string $modelo,int $stock, string $precioVenta, string $precioCompra, int $idMarca, int $idCategoria, int $idUsuario)
    {
        $this->codigo = $codigo;
        $this->modelo = $modelo;
        $this->stock = $stock;
        $this->precioVenta = $precioVenta;
        $this->precioCompra = $precioCompra;
        $this->idMarca = $idMarca;
        $this->idCategoria = $idCategoria;
        $this->idUsuario = $idUsuario;

        $verificar = "SELECT * FROM productos WHERE codigo = '$this->codigo'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO productos(codigo, modelo, stock, precioVenta, precioCompra, idMarca, idCategoria, idUsuario) VALUES (?,?,?,?,?,?,?,?)";
            $datos = array($this->codigo, $this->modelo, $this->stock, $this->precioVenta, $this->precioCompra, $this->idMarca, $this->idCategoria, $this->idUsuario);
            $data=$this->save($sql,$datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }
    
    public function editarProductos(int $idProducto)
    {
        $sql = "SELECT * FROM productos WHERE idProducto = $idProducto";
        $data = $this->select($sql);
        return $data;
    }
    
    public function modificarProductos(string $codigo, string $modelo, int $stock, string $precioVenta, string $precioCompra, int $idMarca, int $idCategoria, int $idProducto, int $idUsuario)
    {
        $this->codigo = $codigo;
        $this->modelo = $modelo;
        $this->stock = $stock;
        $this->precioVenta = $precioVenta;
        $this->precioCompra = $precioCompra;
        $this->idMarca = $idMarca;
        $this->idCategoria = $idCategoria;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;

            $sql = "UPDATE productos SET codigo = ?, modelo=?, stock=?, precioVenta=?, precioCompra=?, idMarca=?, idCategoria=?, idUsuario=? WHERE idProducto =?";
            $datos = array($this->codigo, $this->modelo, $this->stock, $this->precioVenta, $this->precioCompra, $this->idMarca, $this->idCategoria, $this->idUsuario, $this->idProducto);
            $data=$this->save($sql,$datos);
            if ($data == 1) {
                $res = "modificado";
            }else{
                $res = "error";
            }
            return $res;
    }

    public function accionProductos(int $estado, int $idProducto)
    {
        $this->idProducto = $idProducto;
        $this->estado = $estado;
        $sql = "UPDATE productos SET estado = ? WHERE idProducto = ?";
        $datos = array($this->estado, $this->idProducto);
        $data = $this->save($sql,$datos);
        return $data;
    }
    public function consultarDetalle(int $idProducto)
    {
        $sql = "SELECT * FROM productos WHERE idProducto = $idProducto";
        $data = $this->select($sql);
        return $data;
    }
}
?>