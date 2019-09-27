<?php

//require_once '../Database/Conexion.php';
//require_once '../vo/Usuario.php';

class UsuarioDAO {
    /*
     * 
     * @var PDO
     * 
     */

    private $cnn;

    public function __construct(&$cnn) {
        $this->cnn = $cnn;
    }

    public function insertarU2(Usuario $usuario) {
        $sql = ("INSERT INTO usuario (nombre, usuario, pass, correo, ciudad, idCargo, estado)
                VALUES(:nombre, :usuario, :pass, :correo, :ciudad, :idCargo, :estado)");
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'nombre' => $usuario->getNombre(),
            'usuario' => $usuario->getUsuario(),
            'pass' => $usuario->getPass(),
            'correo' => $usuario->getCorreo(),
            'ciudad' => $usuario->getCiudad(),
            'idCargo' => $usuario->getIdCargo(),
            'estado' => 'Activo'
        ]);
        return $this->cnn->lastInsertId();
    }

    public function agregarPasaT(pasaT $pasat) {
        $sql = ("INSERT INTO pasat (idUsuario, nombrePasaT)VALUES(:idUsuario, :nombrePasaT)");
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'nombrePasaT' => $pasat->getNombrePasaT(),
            'idUsuario' => $pasat->getIdUsuario(),
        ]);
        return $this->cnn->lastInsertId();
    }

    public function consultarPasaT($idUsuario) {
        $sql = "SELECT * FROM pasat WHERE idUsuario = :idUsuario";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute(['idUsuario' => $idUsuario]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertarU2Nuevo(Usuario $usuario) {
        $sql = ("INSERT INTO usuario (nombre, usuario, pass, correo, ciudad, idCargo, pasatiempos, estado)
                VALUES(:nombre, :usuario, :pass, :correo, :ciudad, :idCargo, :pasatiempos, :estado)");
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'nombre' => $usuario->getNombre(),
            'usuario' => $usuario->getUsuario(),
            'pass' => $usuario->getPass(),
            'correo' => $usuario->getCorreo(),
            'ciudad' => $usuario->getCiudad(),
            'idCargo' => '1',
            'pasatiempos' => $usuario->getPasatiempos(),
            'estado' => 'Activo'
        ]);
        return $this->cnn->lastInsertId();
    }

    public function consultar() {
        $sql = "SELECT * from usuario INNER JOIN cargo ON
                usuario.idCargo = cargo.idCargo WHERE usuario.estado = 'Activo'";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function iniciarSesion($correo, $pass) {
        $sql = "SELECT u.*, c.cargo
                FROM usuario u INNER JOIN cargo c
                on u.idCargo = c.idCargo
                WHERE correo = :correo AND pass = :pass AND estado = :estado";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute(['correo' => $correo, 'pass' => $pass, 'estado' => 'Activo']);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultado)) {
            throw new ValidacionExcepcion('Error en el usuario y/o clave', -1);
        } else {
            return $resultado[0];
        }
    }

    public function desactivar(Usuario $usuario) {
        $sql = "UPDATE usuario SET estado = :estado WHERE idUsuario = :idUsuario";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'estado' => 'desactivado',
            'idUsuario' => $usuario->getIdUsuario()
        ]);
    }

    public function actualizar(Usuario $usuario) {
        $sql = "UPDATE usuario SET idCargo = :idCargo,
                nombre = :nombre, usuario = :usuario, 
                correo = :correo, pasatiempos = :pasatiempos
                WHERE idUsuario = :idUsuario";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'idCargo' => $usuario->getIdCargo(),
            'nombre' => $usuario->getNombre(),
            'usuario' => $usuario->getUsuario(),
            'correo' => $usuario->getCorreo(),
            'pasatiempos' => $usuario->getPasatiempos(),
            'idUsuario' => $usuario->getIdUsuario()
        ]);
        return $this->cnn->lastInsertId();
    }

    /* ================================================================================================= */
}
