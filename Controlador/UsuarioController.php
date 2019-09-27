<?php

require_once '../Modelo/Database/Conexion.php';
require_once '../Modelo/VO/Usuario.php';
require_once '../Modelo/DAO/UsuarioDAO.php';
require_once './GenericoControlador.php';
require_once './Excepcion/ValidacionExcepcion.php';
require_once './Util/Validacion.php';
require_once '../Modelo/VO/pasaT.php';

class GestionUsuarioController extends GenericoControlador {

    private $usuarioDAO;

    public function __construct(&$cnn = NULL) {
        if (empty($cnn)) {
            $cnn = Conexion::conectar();
        }
        $this->usuarioDAO = new UsuarioDAO($cnn);
    }

    public function insertar() {
        try {
            Validacion::validar(['idCargo' => 'obligatorio', 'nombre' => 'obligatorio', 'usuario' => 'obligatorio', 'pass' => 'obligatorio', 'correo' => 'obligatorio'], $_POST);
            $UsuarioVO = new Usuario;
            $UsuarioVO->setIdCargo($_POST['idCargo']);
            $UsuarioVO->setNombre($_POST['nombre']);
            $UsuarioVO->setUsuario($_POST['usuario']);
            $UsuarioVO->setPass(md5($_POST['pass']));
            $UsuarioVO->setCorreo($_POST['correo']);
            $UsuarioVO->setCiudad($_POST['ciudad']);
            ;
            $this->usuarioDAO->insertarU2($UsuarioVO);
            $this->responderJson(['codigo' => 1, 'mensaje' => 'Persona Registrada Correctamente']);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function insertarPasaT() {
        try {
            // Validacion::validar(['idCargo' => 'obligatorio', 'nombre' => 'obligatorio', 'usuario' => 'obligatorio', 'pass' => 'obligatorio', 'correo' => 'obligatorio'], $_POST);
            $PasaT = new pasaT;
            $PasaT->setIdUsuario($_POST['idUsuario']);
            $PasaT->setNombrePasaT($_POST['nombrePasaT']);
            $this->usuarioDAO->agregarPasaT($PasaT);
            $this->responderJson(['codigo' => 1, 'mensaje' => 'Pasatiempo Registrado correctamente']);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function consultarpasaT() {
        try {
            $datos = $this->usuarioDAO->consultarPasaT($_POST['idUsuario']);
            $this->responderJson(['codigo' => 1, 'mensaje' => 'se consultó correctamente', 'datos' => $datos]);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function insertarUsuarioN() {
        try {
            Validacion::validar(['nombre' => 'obligatorio', 'usuario' => 'obligatorio', 'pass' => 'obligatorio', 'correo' => 'obligatorio', 'passC' => 'obligatorio'], $_POST);
            $UsuarioVO = new Usuario;

            $pass1 = $_POST['pass'];
            $pass2 = $_POST['passC'];

            if ($pass1 === $pass2) {
                $UsuarioVO->setPass(md5($_POST['pass']));
                $UsuarioVO->setNombre($_POST['nombre']);
                $UsuarioVO->setUsuario($_POST['usuario']);
                $UsuarioVO->setCorreo($_POST['correo']);
                $UsuarioVO->setCiudad($_POST['ciudad']);
                $UsuarioVO->setPasatiempos($_POST['pasatiempos']);
                $this->usuarioDAO->insertarU2Nuevo($UsuarioVO);
                $this->responderJson(['codigo' => 1, 'mensaje' => 'Registro Completado Correctamente']);
            } else {
                $this->responderJson(['codigo' => -1, 'mensaje' => 'Las Claven no coinciden ']);
            }
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function consultar() {
        try {
            $datos = $this->usuarioDAO->consultar();
            $this->responderJson(['codigo' => 1, 'mensaje' => 'se consultó correctamente', 'datos' => $datos]);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function iniciarSesion() {
        try {
            $correo = ($_POST['correo']);
            $pass = md5($_POST['pass']);
            $infoUsuario = $this->usuarioDAO->iniciarSesion($correo, $pass);
            session_start();
            $_SESSION['usuario'] = $infoUsuario;
            $this->responderJson(['codigo' => 1, 'datos' => $infoUsuario]);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function consultarPersona() {
        try {
            $datos = $this->usuarioDAO->consultarPersona($_POST['cedula']);
            $this->responderJson(['codigo' => 1, 'mensaje' => 'consultado', 'datos' => $datos]);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function desactivar() {
        try {
            $userVO = new Usuario();
            $userVO->setIdUsuario($_POST['idUsuario']);
            $this->usuarioDAO->desactivar($userVO);
            $this->responderJson(['codigo' => 1, 'mensaje' => 'datos desactivados correctamente']);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

    public function actualizar() {
        try {
            $user = new Usuario();
            $user->setIdCargo($_POST['idCargo']);
            $user->setNombre($_POST['nombre']);
            $user->setUsuario($_POST['usuario']);
            $user->setCorreo($_POST['correo']);
            $user->setIdUsuario($_POST['idUsuario']);
            $user->setPasatiempos($_POST['pasatiempos']);
            $this->usuarioDAO->actualizar($user);
            $this->responderJson(['codigo' => 1, 'mensaje' => 'datos Actualizados correctamente']);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

}

$controlador = new GestionUsuarioController();
$opcion = $_GET['opcion'];
$controlador->$opcion();


//==============================================================================