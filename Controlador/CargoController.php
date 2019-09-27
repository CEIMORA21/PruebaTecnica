<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargoController
 *
 * @author cinsuast
 */
require_once '../Modelo/Database/Conexion.php';
require_once '../Controlador/GenericoControlador.php';
require_once './Excepcion/ValidacionExcepcion.php';
require_once '../Modelo/VO/CargoVO.php';
require_once '../Modelo/DAO/CargoDAO.php';

class CargoController extends GenericoControlador {

    private $cargoDAO;

    public function __construct(&$cnn = NULL) {
        if (empty($cnn)) {
            $cnn = Conexion::conectar();
        }
        $this->cargoDAO = new CargoDAO($cnn);
    }

    public function consultarCargo() {
        try {
            $datos = $this->cargoDAO->consultarCargo();
            $this->responderJson(['codigo' => 1, 'mensaje' => 'se consultó correctamente', 'datos' => $datos]);
        } catch (ValidacionExcepcion $error) {
            $this->responderJson(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
        }
    }

}

$controlador = new CargoController();
$opcion = $_GET['opcion'];
$controlador->$opcion();

