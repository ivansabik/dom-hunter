<?php

class DOMHunter {

    public $strTipoPeticion; // POST, GET
    public $arrParams;
    public $strHeadersManuales;
    public $strUrlObjetivo;
    public $boolPost;
    public $curl;
    public $strDispositivo; // Desktop, Mobile
    public $strOs;
    public $strNavegador;
    public $strHeadersEnviados;
    public $strHeadersRespuesta;
    public $strSemillaBusqueda;
    public $domRespuesta;
    public $htmlRespuesta; // la limpia antes de guardarla! sin espacios, nada!
    public $arrPresas;
    private $domInicio; // tabla id, class, path. Default busca todo
    private $settableVars;

    public function __construct($strUrlObjetivo, $boolPost) {
        $this->strUrlObjetivo = $strUrlObjetivo;
        $this->boolPost = $boolPost;
        $this->settableVars = array_keys(get_object_vars($this));
    }

    public function hunt() {
        $this->curlConnection = curl_init();
        $curlOpts = array(
            CURLOPT_URL => $this->strUrlObjetivo,
            CURLOPT_RETURNTRANSFER => 1,   
        );

        if (strtoupper($this->strRequestType) === 'POST') {
            $curlOpts[CURLOPT_POST] = TRUE;
        }

        curl_setopt_array($this->curlConnection, $curlOpts);
    }

    /**
     * Set y Get de propiedades públicas
     *
     * Por ejemplo, `$dh->strOs('bubulubuntu')` settea $this->strOs, mientras
     * que `echo $dh->strOs();` imprime `bubulubuntu`
     * Un array se pasa como `$dh->arrPresas([$presa1, $presa2]);`
     * ó `$dh->arrPresas($presa1, $presa2);`
     * Hay que pensar que las variables deben de estar asignadas
     * a su tipo, para poder hacer `array_push` en vez de settear todo el array
     * y cosas así
     *
     * @return void
     * @author Rob
     **/
    public function __call($method, $args) {
        if ( in_array($method, $this->settableVars) ) {
            if (count($args) === 0) {
                return $this->$method;
            }
            $value = count($args) === 1 ? $args[0] : $args;
            $this->$method = $value;
        } else {
            throw new Exception('No tengo un método '.$method.'!');
        }
    }

    // Para cuando son muchas tablas resultado como en Tránsito DF, no una tabla
    // como AICM porque ése sería agregar un preyElement del tipo Table
    public function huntMuchos() {
        
    }

}
