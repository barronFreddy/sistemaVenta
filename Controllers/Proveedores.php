<?php
class Proveedores extends Controller{

    public function __construct(){
        session_start();
        //if (empty($_SESSION['activo'])) {
        //    header("Location: ".base_url);
        //}
        parent::__construct();
    }
    public function index()
    {
        
        $this->views->getView($this, "index");
    }
    
    public function listarProveedor()
    {
        $data = $this->model->getProveedores();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnEditarProveedor('.$data[$i]['idProveedor'].');"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarProveedor('.$data[$i]['idProveedor'].');"><i class="fas fa-trash-alt"></i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnReingresarProveedor('.$data[$i]['idProveedor'].');"><i class="fas fa-recycle"></i></button>
                <div/>';
            }
        
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($this->model->getUsuarios());
    }
    

    public function registrarProveedor()
    {
        $ci = $_POST['ci'];
        $tipoPersona = $_POST['tipoPersona'];
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $nombreEmpresa = $_POST['nombreEmpresa'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $idUsuario = $_SESSION['idUsuario'];
        $idProveedor = $_POST['idProveedor'];
        if (empty($ci) || empty($tipoPersona) || empty($nombre) || empty($apellidoPaterno) || empty($direccion) || empty($telefono) ) {
            $msg = array('msg' => 'todos los campos son obligatorios', 'icono'=> 'warning');
            //$msg ="Todos los campos son obligatorios";
        }else{
            if ($idProveedor == "") {
                    $data = $this->model->registrarProveedores($ci,$tipoPersona,$nombre,$apellidoPaterno,$apellidoMaterno,$nombreEmpresa,$direccion,$telefono,$idUsuario);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Proveedor registrado con exito!!', 'icono'=> 'success');
                        //$msg = "si";
                    }else if ($data == "existe") {
                        $msg = array('msg' => 'El Proveedor ya existe!!', 'icono'=> 'warning');
                        //$msg = "El Proveedor ya existe!!";
                    }else{
                        $msg = array('msg' => 'Error', 'icono'=> 'error');
                        //$msg = "error al registrar el Proveedor";
                    }
            }else {
                $data = $this->model->modificarProveedores($ci,$tipoPersona,$nombre,$apellidoPaterno,$apellidoMaterno,$nombreEmpresa,$direccion,$telefono,$idUsuario,$idProveedor);
                if ($data == "modificado") {
                    $msg = array('msg' => 'El Proveedor modificado con exito!!', 'icono'=> 'success');
                    //$msg = "modificado";
                }else{
                    $msg = array('msg' => 'Error al mod Proveedor ya existe!!', 'icono'=> 'error');
                    //$msg = "error al modificar el Proveedor";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editarProveedor(int $id)
    {
        $data = $this->model->editarProveedores($id); //
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function eliminarProveedor(int $id)
    {
        $data = $this->model->accionProveedores(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'El Proveedor eliminado!!', 'icono'=> 'success');
            //$msg = "ok";
        }else {
            $msg = array('msg' => 'error!!', 'icono'=> 'error');
            //$msg = "error al eliminar el Proveedor";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function reingresarProveedor(int $id)
    {
        $data = $this->model->accionProveedores(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'El Proveedor reingresado!!', 'icono'=> 'success');
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