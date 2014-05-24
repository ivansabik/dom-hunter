<?php

namespace Ivansabik\DomHunter;

class SelectOptions {

    public $arrOpcion;
    public $nombreOption;
    public $nombreValue;
    private $_strOpcion;
    public $intSkipVacios;
    private static $_arrOpciones = array('navegacion', 'id_nodo', 'ocurrencia');

    function __construct($arrOpcion, $nombreValue = 'value', $nombreOption = 'option', $intSkipVacios = NULL) {
        $temp = array_slice($arrOpcion, 0, 1, true);
        $key = key($temp);
        if (!in_array($key, self::$_arrOpciones)) {
            throw new Exception('Los tipos validos para unas SELECT OPTION son: ' . implode(',', self::$_arrOpciones));
        }

        $this->nombreValue = $nombreValue;
        $this->nombreOption = $nombreOption;
        $this->_strOpcion = $key;
        $this->arrOpcion = $arrOpcion;
        $this->intSkipVacios = $intSkipVacios;
    }

    public function duckTest($dom) {
        try {
            $textos = array();
            if ($this->_strOpcion == 'navegacion') {
                $arrOpcionesQuery = $this->arrOpcion['navegacion'];
                $temp = array_slice($arrOpcionesQuery, 0, 1, TRUE);
                $key = key($temp);
                $value = array_shift($arrOpcionesQuery);
                $finalObj = $dom->$key($value);
                foreach ($arrOpcionesQuery as $key => $value) {
                    $finalObj = $finalObj->$key($value);
                }
                $textos = $finalObj->find('option');
            } elseif ($this->_strOpcion == 'id_nodo') {
                $strIDNodo = $this->arrOpcion['id_nodo'];
                $options = $dom->find("#$strIDNodo option");
            } elseif ($this->_strOpcion == 'ocurrencia') {
                $intOcurrencia = $this->arrOpcion['ocurrencia'];
                $selects = $dom->find('select');
                if ($intOcurrencia > count($selects)) {
                    throw new Exception('La ocurrencia es mayor al numero de resultados');
                }
                if ($intOcurrencia == -1) {
                    $select = array_pop($selects);
                } else {
                    $select = $selects[$intOcurrencia - 1];
                }
                $options = $select->find('option');
            }

            if ($this->intSkipVacios) {
                for ($i = 1; $i <= $this->intSkipVacios; $i++) {
                    array_shift($options);
                }
            }

            $optionsHunted = array();
            foreach ($options as $option) {
                $optionsHunted[] = array($this->nombreValue => $this->_limpiaStr($option->value), $this->nombreOption => $this->_limpiaStr($option->innertext));
            }

            return $optionsHunted;
        } catch (Exception $e) {
            return new Exception('No existe un nodo resultado de la navegacion del DOM');
        }
    }

    # Funcion se repite en DomHunter.php, refactor?

    private function _limpiaStr($strTexto) {
        $cur_encoding = mb_detect_encoding($strTexto);
        if ($cur_encoding == 'UTF-8' && mb_check_encoding($strTexto, 'UTF-8')) {
            return strip_tags(trim(str_replace('&nbsp;', '', $strTexto)));
        } else {
            return strip_tags(trim(str_replace('&nbsp;', '', utf8_encode($strTexto))));
        }
    }

}

?>