<?php

namespace Ivansabik\DomHunter;

class IdUnico extends Presa {

    public $longitud;
    public $tipo;
    private static $_arrTipos = array('num', 'alpha', 'alphanum');

    function __construct($longitud, $tipo) {
        if (!in_array($tipo, self::$_arrTipos)) {
            throw new Exception('Los tipos validos para un Id Unico son: ' . implode(',', self::$_arrTipos));
        }
        $this->longitud = $longitud;
        $this->tipo = $tipo;
    }

    public function duckTest($arrNodosTexto) {
        foreach ($arrNodosTexto as $nodoTexto) {
            if ($this->tipo == 'num') {
                $patos = array();
                preg_match('/^\d{' . $this->longitud . '}\b/', $nodoTexto, $patos);
                if (!empty($patos)) {
                    return $patos[0];
                }
            }
        }
        return FALSE;
    }

}
