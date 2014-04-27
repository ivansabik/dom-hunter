<?php

namespace Ivansabik\DomHunter;

class NodoDom extends Presa {

    public $strTag;
    public $strAtributo;
    public $arrQueryPath;
    public $intSkip;

    function __construct($arrOpcion, $strAtributo = 'plaintext', $intSkip = 0) {
        $this->intSkip = $intSkip;
        $this->strAtributo = $strAtributo;
        $temp = array_slice($arrOpcion, 0, 1, true);
        $key = key($temp);
        $this->arrQueryPath = array();
        if ($key == 'find') {
            $this->strTag = $arrOpcion['find'];
        } elseif ($key == 'navegacion') {
            $this->arrQueryPath = $arrOpcion['navegacion'];
        } else {
            throw new Exception('Los tipos validos para un nodo dom son: find, navegacion');
        }
    }

    public function duckTest($dom) {
        if (empty($this->arrQueryPath)) {
            $valor = $this->strAtributo;
            if ($this->intSkip == 0) {
                return html_entity_decode($dom->find($this->strTag, 0)->$valor);
            } else {
                return html_entity_decode($dom->find($this->strTag, $this->intSkip)->$valor);
            }
        } else {
            $valor = $this->strAtributo;
            $arrOpcionesQuery = $this->arrQueryPath;
            $temp = array_slice($arrOpcionesQuery, 0, 1, true);
            $key = key($temp);
            $value = array_shift($arrOpcionesQuery);
            $finalObj = $dom->$key($value);
            if (is_object($finalObj)) {
                foreach ($arrOpcionesQuery as $key => $value) {
                    $finalObj = $finalObj->$key($value);
                }
                if ($this->intSkip == 0) {
                    $finalObj = $finalObj[0];
                } else {
                    $finalObj = $finalObj[$this->intSkip - 1];
                }
                return html_entity_decode($finalObj->$valor);
            } else {
                return false;
            }
        }
    }

}
