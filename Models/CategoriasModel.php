<?php
class CategoriasModel extends Query{

    private $descripcion,$linea,$idCategoria,$estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM `categorias`";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCategorias(string $descripcion, string $linea)
    {
        $this->descripcion = $descripcion;
        $this->linea =$linea;

        $verificar = "SELECT * FROM categorias WHERE descripcion = '$this->descripcion'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO categorias(descripcion, linea) VALUES (?,?)";
            $datos = array($this->descripcion, $this->linea);
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
    
    public function editarCategorias(int $idCategoria)
    {
        $sql = "SELECT * FROM categorias WHERE idCategoria = $idCategoria";
        $data = $this->select($sql);
        return $data;
    }
    
    public function modificarCategorias(string $descripcion, string $linea, int $idCategoria)
    {
        $this->descripcion = $descripcion;
        $this->linea = $linea;
        $this->idCategoria = $idCategoria;

        $sql = "UPDATE categorias SET descripcion = ?, linea = ? WHERE idCategoria =?";
        $datos = array($this->descripcion,$this->linea, $this->idCategoria);
        $data=$this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
      
    }

    public function accionCategoria(int $estado, int $idCategoria)
    {
        $this->idCategoria = $idCategoria;
        $this->estado = $estado;
        $sql = "UPDATE categorias SET estado = ? WHERE idCategoria = ?";
        $datos = array($this->estado, $this->idCategoria);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>