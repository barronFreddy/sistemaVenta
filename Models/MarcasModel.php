<?php
class MarcasModel extends Query{

    private $nombreMarca,$idMarca,$estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getMarcas()
    {
        $sql = "SELECT * FROM `marcas`";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarMarcas(string $nombreMarca)
    {
        $this->nombreMarca = $nombreMarca;

        $verificar = "SELECT * FROM marcas WHERE nombreMarca = '$this->nombreMarca'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO marcas(nombreMarca) VALUES (?)";
            $datos = array($this->nombreMarca);
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
    
    public function editarMarcas(int $idMarca)
    {
        $sql = "SELECT * FROM marcas WHERE idMarca = $idMarca";
        $data = $this->select($sql);
        return $data;
    }
    
    public function modificarMarcas(string $nombreMarca, int $idMarca)
    {
        $this->nombreMarca = $nombreMarca;
        $this->idMarca = $idMarca;

        $sql = "UPDATE marcas SET nombreMarca = ? WHERE idMarca =?";
        $datos = array($this->nombreMarca, $this->idMarca);
        $data=$this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
      
    }

    public function accionMarca(int $estado, int $idMarca)
    {
        $this->idMarca = $idMarca;
        $this->estado = $estado;
        $sql = "UPDATE marcas SET estado = ? WHERE idMarca = ?";
        $datos = array($this->estado, $this->idMarca);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>