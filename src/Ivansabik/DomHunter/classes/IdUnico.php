<?php

class IdUnico extends Presa {

    private $longitud;
    private $tipo;

    function __construct($longitud, $tipo) {
        $this->longitud = $longitud;
        $this->tipo = $tipo;
    }

    public function duckTest() {
        return false;
    }

}
