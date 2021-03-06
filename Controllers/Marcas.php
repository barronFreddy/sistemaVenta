<?php
class Marcas extends Controller{

    public function __construct(){
        session_start();
        
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listarMarca()
    {
        $data = $this->model->getMarcas();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnEditarMarca('.$data[$i]['idMarca'].');"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarMarca('.$data[$i]['idMarca'].');"><i class="fas fa-trash-alt"></i></button>
                <div/>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnReingresarMarca('.$data[$i]['idMarca'].');"><i class="fas fa-recycle"></i></button>
                <div/>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($this->model->getUsuarios());
    }

    public function registrarMarca()
    {
        $nombreMarca = $_POST['nombreMarca'];
        $idMarca = $_POST['idMarca'];
        //$hash = md5($_POST['password']);
        if (empty($nombreMarca)) {
            $msg = array('msg' => 'todos los campos son obligatorios', 'icono'=> 'warning');
            //$msg ="Todos los campos son obligatorios";
        }else{
            if ($idMarca == "") {
                $data = $this->model->registrarMarcas($nombreMarca);
                if ($data == "ok") {
                    $msg = array('msg' => 'Marca registrada con exito!!', 'icono'=> 'success');
                
                }else if ($data == "existe") {
                    $msg = array('msg' => 'La marca ya existe!!', 'icono'=> 'warning');
                }else{
                    $msg = array('msg' => 'Error!!', 'icono'=> 'error');
                }
            }else {
                $data = $this->model->modificarMarcas($nombreMarca, $idMarca);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Marca modificada con exito!!', 'icono'=> 'success');
                }else{
                    $msg = array('msg' => 'error!!', 'icono'=> 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editarMarca(int $id)
    {
        $data = $this->model->editarMarcas($id); //
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function eliminarMarca(int $id)
    {
        $data = $this->model->accionMarca(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Marca eliminada con exito!!', 'icono'=> 'success');
        }else {
            $msg = array('msg' => 'error!!', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        //print_r($data);
        //print_r($id);
    }
    public function reingresarMarca(int $id)
    {
        $data = $this->model->accionMarca(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Marca reingresada con exito!!', 'icono'=> 'success');
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