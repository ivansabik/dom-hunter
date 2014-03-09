<?php

require '../vendor/autoload.php';

use Sunra\PhpSimple\HtmlDomParser;

class DomHunter {

    // TODO: Manejo de ocurrencias (skip y como las vaya encontrando tambien si no regresa la misma siempre como peso y peso vol. de estafeta) 
    public $arrParamsPeticion = array();
    public $strUrlObjetivo;
    public $boolPost;
    public $strDispositivo; // Desktop, Mobile
    public $strOs;
    public $strNavegador;
    public $strHeadersEnviados;
    public $strHeadersRespuesta;
    public $strSemillaBusqueda; // Para acelerar la busqueda si se conoce el nodo DOM base
    public $domRespuesta;
    public $arrPresas = array();
    private $_settableVars;
    public $arrNodosTexto = array();
    private static $_arrDispositivos = array('desktop' => '',
        'movil' => ''
    );

    public function __construct($strUrlObjetivo = '', $boolPost = 0) {
        $this->strUrlObjetivo = $strUrlObjetivo;
        $this->boolPost = $boolPost;
        $this->_settableVars = array_keys(get_object_vars($this));
    }

    // Regresa un objeto con los resultados
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
        if ($this->strSemillaBusqueda) {
            $this->domRespuesta = $this->domRespuesta->find($this->strSemillaBusqueda);
        }
        $this->domRespuesta = $this->domRespuesta[0];
        $this->_findTextNodes();
        curl_close($curl);
        $resultados = array();
        foreach ($this->arrPresas as $arrNombreResultadoPresa) {
            $strNombreResultado = $arrNombreResultadoPresa[0];
            $presa = $arrNombreResultadoPresa[1];
            // TODO: refactor, muchas condiciones anidadas!
            // Si no son tablas recorre los nodos texto y llama el duck test
            if (!$presa instanceof Tabla) {
                // Aqui deberia ir algo para manejo de ocurrencias
                foreach ($this->arrNodosTexto as $nodoTexto) {
                    $pato = $presa->duckTest($nodoTexto);
                    if ($pato) {
                        $resultados[$strNombreResultado] = $pato;
                        break;
                    }
                }
            } else {
                throw new Exception('Soy una tabla y regreso un array no un string');
            }
        }
        return $resultados;
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

    // Para cuando son muchas tablas resultado como en Tránsito DF, no una tabla
    // como AICM porque ése sería agregar una Presa de tipo Tabla
    public function huntMuchos() {
        
    }

    private function _findTextNodes() {
        $arrTextNodes = $this->domRespuesta->find('text');
        foreach ($arrTextNodes as $nodoTexto) {
            $strNodoSanitizado = $this->_limpiaStr($nodoTexto->plaintext);
            if (!empty($strNodoSanitizado)) {
                $this->arrNodosTexto[] = $strNodoSanitizado;
            }
        }
    }

    // Quita espacios en blanco '', &nbsp; y tags HTML (para cuando el DOM esta jodido,
    // como en estafeta, regresa tags HTML que no queremos (</tr>, </td>)
    private function _limpiaStr($in_str) {
        $cur_encoding = mb_detect_encoding($in_str);
        if ($cur_encoding == 'UTF-8' && mb_check_encoding($in_str, 'UTF-8')) {
            return strip_tags(trim(str_replace('&nbsp;', '', $in_str)));
        } else {
            return strip_tags(trim(str_replace('&nbsp;', '', utf8_encode($in_str))));
        }
    }

}
