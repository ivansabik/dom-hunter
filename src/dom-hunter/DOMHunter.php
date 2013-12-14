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

    public function __construct($strUrlObjetivo, $boolPost) {
        $this->strUrlObjetivo = $strUrlObjetivo;
        $this->$boolPost = $boolPost;
    }

    public function hunt() {
        $this->curlConnection = curl_init();
        curl_setopt($this->curlConnection, CURLOPT_URL, "http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do");
        curl_setopt($this->curlConnection, CURLOPT_RETURNTRANSFER, 1);
        ($this->strRequestType == 'POST') ? curl_setopt($this->curlConnection, CURLOPT_POST, true) : 'Es GET';
    }

    // Para cuando son muchas tablas resultado como en Tránsito DF, no una tabla
    // como AICM porque ése sería agregar un preyElement del tipo Table
    public function huntMuchos() {
        
    }

}
