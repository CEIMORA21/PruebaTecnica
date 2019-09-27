<?php

class Usuario {

    private $idUsuario;
    private $nombre;
    private $usuario;
    private $pass;
    private $correo;
    private $ciudad;
    private $idCargo;
    private $pasatiempos;
    private $estado;

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPass() {
        return $this->pass;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function getPasatiempos() {
        return $this->pasatiempos;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setPasatiempos($pasatiempos) {
        $this->pasatiempos = $pasatiempos;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}

?>
