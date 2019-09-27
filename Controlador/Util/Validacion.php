<?php

class Validacion{
  public static function validar(array $reglas, array $info){

    foreach($reglas as $parametro => $restriccion){
      $validaciones = explode('|', $restriccion);
      $dato = trim($info[$parametro]);
      foreach($validaciones as $validar){
        switch ($validar) {
          case 'obligatorio':
            if(empty(trim($dato))){
              throw new ValidacionExcepcion("El campo $parametro es obligatorio", -1);
            }
            break;
          case 'numero':
              if(empty($dato)){
                break;
              }
              if(!is_numeric($dato)){
                throw new ValidacionExcepcion("El campo $parametro debe ser un número", -1);
              }
              break;
          case 'email':
              if (!filter_var($dato, FILTER_VALIDATE_EMAIL)) {
                throw new ValidacionExcepcion("La dirección de correo $parametro es inválida.", -1);
              }
              break;
          case 'fecha':
            $valores = explode('/', $dato);
            if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
              }
              else{
                throw new ValidacionExcepcion("La fecha $parametro es inválida.", -1);
              }
              break;
        }
      }
    }
  }
}
