<?php

require_once 'Presa.php';

class IdUnico extends Presa {

    public $longitud;
    public $tipo;
    private static $_arrTipos = array('num', 'alpha', 'alphanum');

    function __construct($longitud, $tipo) {
        $this->longitud = $longitud;
        $this->tipo = $tipo;
    }

    public function duckTest($strTextoPrueba) {
        if (!in_array($this->tipo, self::$_arrTipos)) {
            throw new Exception('Los tipos validos para un Id Unico son: ' . implode(',', $this->_arrTipos));
        }
        if ($this->tipo == 'num') {
            $patos = array();
            preg_match('/^\d{' . $this->longitud . '}\b/', $strTextoPrueba, $patos);
            if (!empty($patos)) {
                return $patos[0];
            }
        }
        return false;
    }

}
