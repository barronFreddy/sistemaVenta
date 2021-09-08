<?php
class ClientesModel extends Query{

    private $ci,$nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$direccion,$idCliente,$estado,$idUsuario;
    public function __construct()
    {
        parent::__construct();
    }
    //public function getUsuario()
    //{
    //    $sql = "SELECT * FROM usuarios WHERE 1";
    //    $data = $this->select($sql);
    //    return $data;
    //}
    public function getClientes()
    {
        $sql = "SELECT idCliente, ci, concat(nombre,' ', apellidoPaterno,' ', apellidoMaterno)AS nombreCompleto, telefono, direccion, estado FROM `clientes`";
        $data = $this->selectAll($sql);
        return $data;
    }
    /*
    public function getRoles()
    {
        $sql = "SELECT * FROM roles WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCajas()
    {
        $sql = "SELECT * FROM cajas WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    */
    public function registrarClientes(string $ci, string $nombre, string $apellidoPaterno, string $apellidoMaterno, string $telefono, string $direccion, int $idUsuario)
    {
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->idUsuario = $idUsuario;

        $verificar = "SELECT * FROM clientes WHERE ci = '$this->ci'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO clientes(ci, nombre, apellidoPaterno, apellidoMaterno, telefono, direccion, idUsuario) VALUES (?,?,?,?,?,?,?)";
            $datos = array($this->ci, $this->nombre, $this->apellidoPaterno,$this->apellidoMaterno, $this->telefono, $this->direccion, $this->idUsuario);
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
    
    public function editarClientes(int $idCliente)
    {
        $sql = "SELECT * FROM clientes WHERE idCliente = $idCliente";
        $data = $this->select($sql);
        return $data;
    }
    
    public function modificarClientes(string $ci, string $nombre, string $apellidoPaterno, string $apellidoMaterno, string $telefono, string $direccion, int $idCliente, int $idUsuario)
    {
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->idCliente = $idCliente;
        $this->idUsuario = $idUsuario;

        $sql = "UPDATE clientes SET ci = ?, nombre=?, apellidoPaterno=?, apellidoMaterno=?, telefono=?, direccion=?, idUsuario=? WHERE idCliente =?";
        $datos = array($this->ci, $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->telefono, $this->direccion, $this->idCliente, $this->idUsuario);
        $data=$this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
      
    }

    public function accionCliente(int $estado, int $idCliente)
    {
        $this->idCliente = $idCliente;
        $this->estado = $estado;
        $sql = "UPDATE clientes SET estado = ? WHERE idCliente = ?";
        $datos = array($this->estado, $this->idCliente);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>