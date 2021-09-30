<?php
class Clientes extends Controller{

    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index()
    {
        
        $this->views->getView($this, "index");
        //print_r($this->model->getUsuario());
    }
    
    public function listarCliente()
    {
        $data = $this->model->getClientes();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnEditarCliente('.$data[$i]['idCliente'].');"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarCliente('.$data[$i]['idCliente'].');"><i class="fas fa-trash-alt"></i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnReingresarCliente('.$data[$i]['idCliente'].');"><i class="fas fa-recycle"></i></button>
                <div/>';
            }
        
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($this->model->getUsuarios());
    }
    

    public function registrarCliente()
    {
        $ci = $_POST['ci'];
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $idUsuario = $_SESSION['idUsuario'];
        $idCliente = $_POST['idCliente'];
        if (empty($ci) || empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($telefono) || empty($direccion)) {
            $msg = array('msg' => 'todos los campos son obligatorios', 'icono'=> 'warning');
            //$msg ="Todos los campos son obligatorios";
        }else{
            if ($idCliente == "") {
                    $data = $this->model->registrarClientes($ci,$nombre, $apellidoPaterno,$apellidoMaterno,$telefono,$direccion,$idUsuario);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Cliente registrada con exito!!', 'icono'=> 'success');
                    }else if ($data == "existe") {
                        $msg = array('msg' => 'El cliente ya exite!!', 'icono'=> 'warning');
                    }else{
                        $msg = array('msg' => 'Error!!', 'icono'=> 'error');
                    }
            }else {
                $data = $this->model->modificarClientes($ci,$nombre, $apellidoPaterno,$apellidoMaterno,$telefono,$direccion, $idCliente,$idUsuario);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Cliente modificado con exito!!', 'icono'=> 'success');
                }else{
                    $msg = array('msg' => 'error!!', 'icono'=> 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editarCliente(int $id)
    {
        $data = $this->model->editarClientes($id); //
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function eliminarCliente(int $id)
    {
        $data = $this->model->accionCliente(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Cliente eliminado con exito!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'Error!!', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function reingresarCliente(int $id)
    {
        $data = $this->model->accionCliente(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Cliente reingresado con exito!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'error!!', 'icono'=> 'error');
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