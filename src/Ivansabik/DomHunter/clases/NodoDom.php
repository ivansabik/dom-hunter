<?php

class NodoDom extends Presa {

    public $tipo;
    public $valor;

    function __construct($tipo, $valor, $skip = 0) {
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->skip = $skip;
    }

    public function duckTest($nodoDom) {
        $valor = $this->valor;
        if ($this->skip == 0) {
            return html_entity_decode($nodoDom->find($this->tipo, 0)->$valor);
        } else {
            return html_entity_decode($nodoDom->find($this->tipo, $this->skip)->$valor);
        }
    }

}
