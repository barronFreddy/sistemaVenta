<?php
class Usuarios extends Controller{

    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index()
    {
        if (empty($_SESSION['activo'])) {
            header("Location: ".base_url);
        }
        $data['roles'] = $this->model->getRoles();
        $this->views->getView($this, "index", $data);
        //print_r($this->model->getUsuario());
    }
    public function listarUsuario()
    {
        $data = $this->model->getUsuarios();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" type="button" onclick="btnEditarUsuario('.$data[$i]['idUsuario'].');"><i class="fas fa-user-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarUsuario('.$data[$i]['idUsuario'].');"><i class="fas fa-trash-alt"></i></button>
            <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnReingresarUsuario('.$data[$i]['idUsuario'].');"><i class="fas fa-recycle"></i></button>
            <div/>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($this->model->getUsuarios());
    }
    public function validar()
    {
        if(empty($_POST['usuario']) || empty($_POST['password'])){
            $msg ="los campos estan vacios";
        }else{
            $usuario = $_POST['usuario'];
            $password = md5($_POST['password']);
            $data = $this->model->getUsuario($usuario, $password);
            if($data){
                $_SESSION['idUsuario'] = $data['idUsuario'];
                $_SESSION['usuario'] = $data['nombreUsuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "error en usuario o contraseña";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //print_r($data);
        //print_r($_POST);
        die();
    }

    public function registrar()
    {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $password = md5($_POST['password']);
        $confirmar = md5($_POST['confirmar']);
        $rol = $_POST['rol'];
        $idUsuario = $_POST['idUsuario'];
        //$hash = md5($_POST['password']);
        if (empty($usuario) || empty($nombre) || empty($apellido) || empty($rol)) {
            $msg = array('msg' => 'todos los campos son obligatorios', 'icono'=> 'warning');
            //$msg ="Todos los campos son obligatorios";
        }else{
            if ($idUsuario == "") {
                if ($password != $confirmar) {
                $msg = array('msg' => 'Las contraseñas no coinciden!!', 'icono'=> 'warning');
                //$msg = "Las contraseñas no coinciden!!";
                }else {
                    $data = $this->model->registrarUsuario($usuario,$nombre, $apellido,$password,$rol);
                    if ($data == "ok") {
                        //$msg = "si";
                        $msg = array('msg' => 'Usuario registrado con exito!!', 'icono'=> 'success');
                    }else if ($data == "existe") {
                        //$msg = "El usuario ya existe!!";
                        $msg = array('msg' => 'El usuario ya existe!!', 'icono'=> 'warning');
                    }else{
                        //$msg = "error al registrar el usuario";
                        $msg = array('msg' => 'error al registrar el usuario', 'icono'=> 'error');
                    }
                }
            
            }else {
                $data = $this->model->modificarUsuario($usuario,$nombre, $apellido,$rol, $idUsuario);
                if ($data == "modificado") {
                    //$msg = "modificado";
                    $msg = array('msg' => 'modificado', 'icono'=> 'success');
                }else if ($data == "existe") {
                    //$msg = "El usuario ya existe!!";
                    $msg = array('msg' => 'El usuario ya existe!!', 'icono'=> 'warning');
                }else{
                    //$msg = "error al modificar el usuario";
                    $msg = array('msg' => 'error al modificar el usuario', 'icono'=> 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $id)
    {
        $data = $this->model->editarUsuario($id); //
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accioneUsuario(0, $id);
        if ($data == 1) {
            //$msg = "ok";
            $msg = array('msg' => 'Usuario dado de baja!!', 'icono'=> 'success');
        }else {
            //$msg = "error al eliminar el usuario";
            $msg = array('msg' => 'Error al eliminar el usuario!!', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accioneUsuario(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Usuario dado de alta!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'Error al reingresar el usuario!!', 'icono'=> 'error');
            //$msg = "error al reingresar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function cambiarContrasena()
    {
        $actual = $_POST['actual'];
        $nueva = $_POST['nueva'];
        $confirma = $_POST['confirma'];
        if (empty($actual) || empty($nueva) || empty($confirma)) {
            $msg = array('msg' => 'Todos los campos son abligatorios', 'icono'=>'warning');
        }else{
            if ($nueva != $confirma){
                $msg = array('msg' => 'Las contraseñas no coinciden!!', 'icono'=>'warning');
            }else{
                $idUsuario =$_SESSION['idUsuario'];
                $md5 = md5($actual);
                $data = $this->model->editarPass($md5,$idUsuario);
                //print_r($data);
                //exit;
                if (!empty($data)) {
                    $verificar = $this->model->modificarPass(md5($nueva), $idUsuario);
                    if ($verificar == 1) {
                        $msg = array('msg' => 'Contraseña modicada!!', 'icono'=>'success');
                    }else {
                        $msg = array('msg' => 'error!!', 'icono'=>'error');
                    }
                }else{
                    $msg = array('msg' => 'Contraseña actual incorrecta!!', 'icono'=>'warning');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: ".base_url);
    }
}
?>