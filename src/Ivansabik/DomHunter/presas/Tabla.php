<?php

namespace Ivansabik\DomHunter;

class Tabla extends Presa {

    public $arrOpcion;
    private $_strOpcion;
    public $arrNombresColumnas;
    public $intSkipVacios;
    private static $_arrOpciones = array('navegacion', 'titulos', 'ocurrencia');

    function __construct($arrOpcion, $arrNombresColumnas, $intSkipVacios = NULL) {
        $temp = array_slice($arrOpcion, 0, 1, true);
        $key = key($temp);
        if (!in_array($key, self::$_arrOpciones)) {
            throw new Exception('Los tipos validos para una tabla son: ' . implode(',', self::$_arrOpciones));
        }
        $this->arrOpcion = $arrOpcion;
        $this->_strOpcion = $key;
        $this->arrNombresColumnas = $arrNombresColumnas;
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
                $textos = $finalObj->find('td');
            } elseif ($this->_strOpcion == 'ocurrencia') {
                $intOcurrencia = $this->arrOpcion['ocurrencia'];
                $tablas = $dom->find('table');
                if ($intOcurrencia > count($tablas)) {
                    throw new Exception('La ocurrencia es mayor al numero de resultados');
                }
                if ($intOcurrencia == -1) {
                    $tabla = array_pop($tablas);
                } else {
                    $tabla = $tablas[$intOcurrencia - 1];
                }
                $textos = $tabla->find('td');
            }

            # Saltar TDss vacíos que se pueden encontrar al principio (como para de MisProfesores)
            # ========================================
            if ($this->intSkipVacios) {
                for ($i = 1; $i <= $this->intSkipVacios; $i++) {
                    array_shift($textos);
                }
            }
            # ========================================

            $arrRenglones = array();
            $intNumColumnas = count($this->arrNombresColumnas);

            # 0 ó 1 dependiendo si es true skipTitulos
            # ========================================
            $intInicioParsing = 0;
            # ========================================

            for ($i = $intInicioParsing; $i < count($textos); $i+=$intNumColumnas) {
                $arrColumna = array();
                for ($j = 0; $j < $intNumColumnas; $j++) {
                    $arrColumna[$this->arrNombresColumnas[$j]] = $this->_limpiaStr($textos[$i + $j]->plaintext);
                }
                $arrRenglones[] = $arrColumna;
            }
            return $arrRenglones;
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