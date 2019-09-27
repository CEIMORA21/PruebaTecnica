<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pasaT
 *
 * @author crist
 */
class pasaT {

    private $idPasat;
    private $nombrePasaT;
    private $idUsuario;

    function getIdPasat() {
        return $this->idPasat;
    }

    function getNombrePasaT() {
        return $this->nombrePasaT;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdPasat($idPasat) {
        $this->idPasat = $idPasat;
    }

    function setNombrePasaT($nombrePasaT) {
        $this->nombrePasaT = $nombrePasaT;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

}
