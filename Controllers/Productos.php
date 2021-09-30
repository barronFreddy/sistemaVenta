<?php
class Productos extends Controller{

    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['marcas'] = $this->model->getMarcas();
        $data['categorias'] = $this->model->getCategorias();
        $this->views->getView($this, "index", $data);
        //print_r($this->model->getUsuario());
    }
    public function listarProducto()
    {
        
        $data = $this->model->getProductos();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" type="button" onclick="btnEditarProducto('.$data[$i]['idProducto'].');"><i class="fas fa-user-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarProducto('.$data[$i]['idProducto'].');"><i class="fas fa-trash-alt"></i></button>
            <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnReingresarProducto('.$data[$i]['idProducto'].');"><i class="fas fa-recycle"></i></button>
            <div/>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($this->model->getUsuarios());
    }
    public function registrarProducto()
    {
        $codigo = $_POST['codigo'];
        $modelo = $_POST['modelo'];
        $stock = $_POST['stock'];
        $precioVenta = $_POST['precioVenta'];
        $precioCompra = $_POST['precioCompra'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];
        $idUsuario = $_SESSION['idUsuario'];
        $idProducto = $_POST['idProducto'];

        if (empty($codigo) || empty($modelo) || empty($stock) || empty($precioVenta) || empty($precioCompra) || empty($marca) || empty($categoria)) {
            $msg = array('msg' => 'todos los campos son obligatorios', 'icono'=> 'warning');
            //$msg ="Todos los campos son obligatorios";
        }else{
            if ($idProducto == "") {
                    $data = $this->model->registrarProductos($codigo,$modelo, $stock, $precioVenta,$precioCompra,$marca,$categoria,$idUsuario);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Producto registrado con exito!!', 'icono'=> 'success');
                    }else if ($data == "existe") {
                        $msg = array('msg' => 'El modelo de producto registrado ya existe!!', 'icono'=> 'warning');
                    }else{
                        $msg = array('msg' => 'Error!!', 'icono'=> 'error');
                    }
            }else {
                $data = $this->model->modificarProductos($codigo,$modelo, $stock, $precioVenta,$precioCompra,$marca,$categoria, $idProducto,$idUsuario);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Produco modificado!!', 'icono'=> 'success');
                }else{
                    $msg = array('msg' => 'Error!!', 'icono'=> 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editarProducto(int $id)
    {
        $data = $this->model->editarProductos($id); //
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function eliminarProducto(int $id)
    {
        $data = $this->model->accionProductos(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'El Producto eliminado!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'Error!!', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function reingresarProducto(int $id)
    {
        $data = $this->model->accionProductos(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Producto reingresado!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'Error!!', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }

    public function salir()
    {
        session_destroy();
        header("location: ".base_url);
    }
}
?>