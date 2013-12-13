<?php

class DOMHunter {

    private $url, $requestType, $params, $browser, $customHeaders;
    public $targetUrl;
    public $requestType;
    private $curlConnection;
    
    private $domInicio; // tabla id, class, path. Default busca todo

    public function __construct($targetUrl) {
        $this->targetUrl = $targetUrl;
    }

    public function addPreyCharacteristic() {
        
    }

    public function hunt() {
        
    }
    
    // Para cuando son muchas tablas resultado como en Tránsito DF, no una tabla
    // como AICM porque ése sería agregar un preyElement del tipo Table
    public function huntMultiple() {
        
    }

}
