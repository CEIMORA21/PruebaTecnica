<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargoDAO
 *
 * @author cinsuast
 */
class CargoDAO {
    /*
     * 
     * @var PDO
     * 
     */

    private $cnn;

    public function __construct(&$cnn) {
        $this->cnn = $cnn;
    }


    public function consultarCargo() {
        $sql = "SELECT * FROM cargo";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchall(PDO::FETCH_OBJ);
    }

    //almacenar en otra variable
}
