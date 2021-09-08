<?php
class ProveedoresModel extends Query{

    private $ci,$tipoPersona,$nombre,$apellidoPaterno,$apellidoMaterno,$nombreEmpresa,$telefono,$direccion,$idProveedor,$estado,$idUsuario;
    public function __construct()
    {
        parent::__construct();
    }
    public function getProveedores()
    {
        $sql = "SELECT idProveedor, ci, tipoPersona, concat(nombre,' ', apellidoPaterno,' ', apellidoMaterno)AS nombreCompleto, nombreEmpresa, direccion, telefono, estado FROM `proveedores`";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarProveedores(string $ci, string $tipoPersona, string $nombre, string $apellidoPaterno, string $apellidoMaterno, string $nombreEmpresa, string $direccion,int $telefono,int $idUsuario)
    {
        $this->ci = $ci;
        $this->tipoPersona = $tipoPersona;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->idUsuario = $idUsuario;

        $verificar = "SELECT * FROM proveedores WHERE ci = '$this->ci'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO proveedores(ci, tipoPersona, nombre, apellidoPaterno, apellidoMaterno, nombreEmpresa, direccion, telefono, idUsuario) VALUES (?,?,?,?,?,?,?,?,?)";
            $datos = array($this->ci, $this->tipoPersona, $this->nombre, $this->apellidoPaterno,$this->apellidoMaterno,$this->nombreEmpresa, $this->direccion, $this->telefono,$this->idUsuario);
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
    
    public function editarProveedores(int $idProveedor)
    {
        $sql = "SELECT * FROM proveedores WHERE idProveedor = $idProveedor";
        $data = $this->select($sql);
        return $data;
    }
    
    public function modificarProveedores(string $ci,string $tipoPersona, string $nombre, string $apellidoPaterno, string $apellidoMaterno,string $nombreEmpresa, string $direccion, int $telefono, int $idProveedor, int $idUsuario)
    {
        $this->ci = $ci;
        $this->tipoPersona = $tipoPersona;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->idUsuario = $idUsuario;
        $this->idProveedor = $idProveedor;

        $sql = "UPDATE proveedores SET ci = ?, tipoPersona=?, nombre=?, apellidoPaterno=?, apellidoMaterno=?, nombreEmpresa=?, direccion=?, telefono=?, idUsuario=? WHERE idProveedor =?";
        $datos = array($this->ci, $this->tipoPersona, $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->nombreEmpresa, $this->direccion, $this->telefono, $this->idProveedor,$this->idUsuario);
        $data=$this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
      
    }

    public function accionProveedores(int $estado, int $idProveedor)
    {
        $this->idProveedor = $idProveedor;
        $this->estado = $estado;
        $sql = "UPDATE proveedores SET estado = ? WHERE idProveedor = ?";
        $datos = array($this->estado, $this->idProveedor);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>