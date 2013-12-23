<?php

/**
 *
 * @author ivansabik
 */
class Presa {

    public $arrTextNodes;
    public $params;
    public $numOcurrencia;
    public $atributoResultado;

    public function __construct($params = array(), $numOcurrencia = 1) {
        $this->params = $params;
        $this->numOcurrencia = $numOcurrencia;
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
