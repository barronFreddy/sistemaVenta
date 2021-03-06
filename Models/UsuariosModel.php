<?php
class UsuariosModel extends Query{

    private $usuario,$nombre,$apellido,$password,$idRol,$idUsuario,$estado;
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
    public function getUsuario(string $usuario, string $password)
    {
        $sql = "SELECT * FROM usuarios WHERE nombreUsuario = '$usuario' AND password = '$password' AND estado != 0";
        $data = $this->select($sql);
        return $data;
    }
    public function getUsuarios()
    {
        $sql = "SELECT u.*, r.idRol AS id_rol, r.nombreRol 
        FROM usuarios u 
         INNER JOIN roles r ON u.idRol = r.idRol";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getRoles()
    {
        $sql = "SELECT * FROM roles WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarUsuario(string $usuario, string $nombre, string $apellido, string $password, int $idRol)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->password = $password;
        $this->idRol = $idRol;

        $verificar = "SELECT * FROM usuarios WHERE nombreUsuario = '$this->usuario'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "INSERT INTO usuarios(nombreUsuario, nombre, apellido, password, idRol) VALUES (?,?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->apellido,$this->password, $this->idRol);
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
    
    public function editarUsuario(int $idUsuario)
    {
        $sql = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
        $data = $this->select($sql);
        return $data;
    }
    public function editarPass(string $pass, int $idUsuario)
    {
        $sql = "SELECT * FROM usuarios WHERE password = '$pass' AND idUsuario = $idUsuario";
        $data = $this->select($sql);
        return $data;
    }
    
    public function modificarUsuario(string $usuario, string $nombre, string $apellido, int $idRol, int $idUsuario)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->idRol = $idRol;
        $this->idUsuario = $idUsuario;

        $verificar = "SELECT * FROM usuarios WHERE nombreUsuario = '$this->usuario'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $sql = "UPDATE usuarios SET nombreUsuario = ?, nombre=?, apellido=?, idRol=? WHERE idUsuario =?";
            $datos = array($this->usuario, $this->nombre, $this->apellido, $this->idRol, $this->idUsuario);
            $data=$this->save($sql,$datos);
            if ($data == 1) {
                $res = "modificado";
            }else{
                $res = "error";
            }
            return $res;
        }else{
            $res = "existe";
        }
        return $res;
    }

    public function accioneUsuario(int $estado, int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
        $this->estado = $estado;
        $sql = "UPDATE usuarios SET estado = ? WHERE idUsuario = ?";
        $datos = array($this->estado, $this->idUsuario);
        $data = $this->save($sql,$datos);
        return $data;
    }

    public function modificarPass(string $clave, int $idUsuario)
    {
        $sql = "UPDATE usuarios SET password = ? WHERE idUsuario = ?";
        $datos = array($clave, $idUsuario);
        $data = $this->save($sql,$datos);
        return $data;
    }
}
?>