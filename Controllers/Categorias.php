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
            $msg = array('msg' => 'todos los campos son obligatorios', 'icono'=> 'warning');
            //$msg ="Todos los campos son obligatorios";
        }else{
            if ($idCategoria == "") {
                $data = $this->model->registrarCategorias($descripcion, $linea);
                if ($data == "ok") {
                    $msg = array('msg' => 'Categoria registrada con exito!!', 'icono'=> 'success');
                }else if ($data == "existe") {
                    $msg = array('msg' => 'La categoria ya exite!!', 'icono'=> 'warning');
                }else{
                    $msg = array('msg' => 'Error!!', 'icono'=> 'error');
                }
            }else {
                $data = $this->model->modificarCategorias($descripcion,$linea, $idCategoria);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Categoria modificada con exito!!', 'icono'=> 'success');
                }else{
                    $msg = array('msg' => 'Error!!', 'icono'=> 'error');
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
            $msg = array('msg' => 'Categoria eliminada con exito!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'Error!!', 'icono'=> 'error');
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
            $msg = array('msg' => 'Categoria reingresada con exito!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'Error!!', 'icono'=> 'success');
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