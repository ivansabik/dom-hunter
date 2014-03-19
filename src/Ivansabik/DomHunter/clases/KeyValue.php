<?php

/**
 * Description of KeyValue
 *
 * @author ivansabik
 */
class KeyValue extends Presa {

    public $key;
    public $value;
    public $boolReturnSiguiente;
    public $boolCoincidenciaExacta;
    private static $_arrCaracteresRaros = array('Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
        'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
        'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
        'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');

    function __construct($key, $boolReturnSiguiente = true, $boolCoincidenciaExacta = false) {
        $this->key = $key;
        $this->boolReturnSiguiente = $boolReturnSiguiente;
        $this->boolCoincidenciaExacta = $boolCoincidenciaExacta;
    }

    public function duckTest($strTextoPrueba, $strTextoResultado) {
        $patos = array();
        if ($this->boolCoincidenciaExacta == TRUE) {
            if (strcasecmp(strtr($this->key, self::$_arrCaracteresRaros), strtr($strTextoPrueba, self::$_arrCaracteresRaros)) == 0) {
                $patos[] = $this->key;
            }
        } else {
            preg_match('/' . strtr($this->key, self::$_arrCaracteresRaros) . '\b/i', strtr($strTextoPrueba, self::$_arrCaracteresRaros), $patos);
        }

        if (!empty($patos)) {
            if ($this->boolReturnSiguiente) {
                return $strTextoResultado;
            } else {
                return $strTextoPrueba;
            }
        }
        return false;
    }

}
