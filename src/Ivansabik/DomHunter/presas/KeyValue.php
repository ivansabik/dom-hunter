<?php

namespace Ivansabik\DomHunter;

# Description of KeyValue

class KeyValue extends Presa {

    public $key;
    public $value;
    public $intReturnSiguiente;
    public $boolCoincidenciaExacta;
    private static $_arrCaracteresRaros = array('Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
        'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
        'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
        'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');

    function __construct($key, $intReturnSiguiente = 1, $boolCoincidenciaExacta = FALSE) {
        $this->key = $key;
        $this->intReturnSiguiente = $intReturnSiguiente;
        $this->boolCoincidenciaExacta = $boolCoincidenciaExacta;
    }

    public function duckTest($arrNodosTexto) {
        for ($i = 0; $i < count($arrNodosTexto) - 1; $i++) {
            $nodoTexto = $arrNodosTexto[$i];
            $patos = array();
            if ($this->boolCoincidenciaExacta == TRUE) {
                preg_match('/^' . strtr(preg_quote($this->key), self::$_arrCaracteresRaros) . '/', strtr($nodoTexto, self::$_arrCaracteresRaros), $patos);
            } else {
                # Sera?
                preg_match('/' . strtr(preg_quote($this->key), self::$_arrCaracteresRaros) . '\b/i', strtr($nodoTexto, self::$_arrCaracteresRaros), $patos);
            }
            if (!empty($patos)) {
                return $arrNodosTexto[$i + $this->intReturnSiguiente];
            }
        }
        return FALSE;
    }

}