<?php

require '../../../vendor/autoload.php';

use Sunra\PhpSimple\HtmlDomParser;

class DOMHunter {

    public $arrParamsPeticion;
    public $strUrlObjetivo;
    public $boolPost;
    public $strDispositivo; // Desktop, Mobile
    public $strOs;
    public $strNavegador;
    public $strHeadersEnviados;
    public $strHeadersRespuesta;
    public $strSemillaBusqueda;
    public $domRespuesta;
    public $arrPresas;
    private $settableVars;
    private static $arrDispositivos = array('desktop', 'movil');
    private static $arrOss = array('win', 'ubuntu', 'osx');
    private static $arrNavegadores = array('ie', 'chrome', 'firefox', 'safari');

    public function __construct($strUrlObjetivo = '', $boolPost = 0) {
        $this->strUrlObjetivo = $strUrlObjetivo;
        $this->boolPost = $boolPost;
        $this->settableVars = array_keys(get_object_vars($this));
    }

    public function hunt() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->strUrlObjetivo);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        // Si la petición es GET, construye URL con params, si es post hay adicionales pal cURL
        if (!$this->boolPost) {
            if ($this->arrParamsPeticion) {
                $strParamsHttp = http_build_query($this->arrParamsPeticion);
                $this->strUrlObjetivo .= '?' . $strParamsHttp;
            }
        }
        if ($this->boolPost) {
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->arrParamsPeticion);
        }
        // Asigna HTML y DOM respuestas de la petición
        $strRespuestaCurl = curl_exec($curl);
        $intHeaderSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $this->strHeadersRespuesta = substr($strRespuestaCurl, 0, $intHeaderSize);
        $this->domRespuesta = substr($strRespuestaCurl, $intHeaderSize);
        $this->domRespuesta = HtmlDomParser::str_get_html($this->domRespuesta);
        $this->domRespuesta = $this->domRespuesta->find($this->strSemillaBusqueda);
        $this->domRespuesta = $this->domRespuesta[0];
        curl_close($curl);
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
     * */
    public function __call($method, $args) {
        if (in_array($method, $this->settableVars)) {
            if (count($args) === 0) {
                return $this->$method;
            }
            $value = count($args) === 1 ? $args[0] : $args;
            $this->$method = $value;
        } else {
            throw new Exception('No tengo un método ' . $method . '!');
        }
    }

    // Para cuando son muchas tablas resultado como en Tránsito DF, no una tabla
    // como AICM porque ése sería agregar una Presa de tipo Tabla
    public function huntMuchos() {
        
    }

}
