<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargoVO
 *
 * @author cinsuast
 */
class CargoVO {
    
    private $idCargo;
    private $cargo;
    private $correoCorporativo;
    private $celularCorporatio;
    
    
    function getIdCargo() {
        return $this->idCargo;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }
  
    function getCargo() {
        return $this->cargo;
    }

    function getCorreoCorporativo() {
        return $this->correoCorporativo;
    }

    function getCelularCorporatio() {
        return $this->celularCorporatio;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setCorreoCorporativo($correoCorporativo) {
        $this->correoCorporativo = $correoCorporativo;
    }

    function setCelularCorporatio($celularCorporatio) {
        $this->celularCorporatio = $celularCorporatio;
    }

    
}
