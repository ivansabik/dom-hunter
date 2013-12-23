<?php

/**
 *
 * @author ivansabik
 */
class Presa {

    public $arrTextNodes;
    public $arrParams;
    public $intNumOcurrencia;

    public function __construct($arrParams = array(), $intNumOcurrencia = 1) {
        $this->arrParams = $arrParams;
        $this->intNumOcurrencia = $intNumOcurrencia;
    }

    public function __call($method, $args) {
        if (in_array($method, $this->_settableVars)) {
            if (count($args) === 0) {
                return $this->$method;
            }
            $value = count($args) === 1 ? $args[0] : $args;
            $this->$method = $value;
        } else {
            throw new Exception('No tengo un método ' . $method . '!');
        }
    }

    // Principal implementa búsqueda de la presa
    public function busca() {
        
    }

}
