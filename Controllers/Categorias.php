<?php
class Categorias extends Controller{

    public function __construct(){
        session_start();
        
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listarCategoria()
    {
        $data = $this->model->getCategorias();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnEditarCategoria('.$data[$i]['idCategoria'].');"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarCategoria('.$data[$i]['idCategoria'].');"><i class="fas fa-trash-alt"></i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnReingresarCategoria('.$data[$i]['idCategoria'].');"><i class="fas fa-recycle"></i></button>
                <div/>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($this->model->getUsuarios());
    }

    public function registrarCategoria()
    {
        $descripcion = $_POST['descripcion'];
        $linea = $_POST['linea'];
        $idCategoria = $_POST['idCategoria'];
        //$hash = md5($_POST['password']);
        if (empty($descripcion) || empty($linea)) {
            $msg ="Todos los campos son obligatorios";
        }else{
            if ($idCategoria == "") {
                $data = $this->model->registrarCategorias($descripcion, $linea);
                if ($data == "ok") {
                    $msg = "si";
                }else if ($data == "existe") {
                    $msg = "La Categoria ya existe!!";
                }else{
                    $msg = "error al registrar la Categoria";
                }
            }else {
                $data = $this->model->modificarCategorias($descripcion,$linea, $idCategoria);
                if ($data == "modificado") {
                    $msg = "modificado";
                }else if ($data == "existe") {
                    $msg = "La Categoria ya existe!!";
                }else{
                    $msg = "error al modificar la Categoria";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editarCategoria(int $id)
    {
        $data = $this->model->editarCategorias($id); //
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function eliminarCategoria(int $id)
    {
        $data = $this->model->accionCategoria(0, $id);
        if ($data == 1) {
            $msg = "ok";
        }else {
            $msg = "error al eliminar el Categoria";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function reingresarCategoria(int $id)
    {
        $data = $this->model->accionCategoria(1, $id);
        if ($data == 1) {
            $msg = "ok";
        }else {
            $msg = "error al reingresar el Categoria";
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