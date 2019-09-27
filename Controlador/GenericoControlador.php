<?php

class
GenericoControlador {

    public function responderJson($info = array()) {
        header('Content-type:application/json');
        $json = json_encode($info);
        echo $json;
    }

}
