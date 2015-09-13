<?php

# Status, qué funciona, qué no, qué falta
# TODO: refactor, muchas condiciones anidadas!
# TODO definir metodos de construccion de presas, que sean consistentes

namespace Ivansabik\DomHunter;

require 'presas/Presa.php';
require 'presas/KeyValue.php';
require 'presas/NodoDom.php';
require 'presas/Tabla.php';
require 'presas/IdUnico.php';
require 'presas/SelectOptions.php';

use Sunra\PhpSimple\HtmlDomParser;

class DomHunter {
# TODO: Manejo de ocurrencias (skip y como las vaya encontrando tambien si 
# no regresa la misma siempre como peso y peso vol. de estafeta)

    public $arrParamsPeticion = array();
    public $strUrlObjetivo;
    public $boolPost;
    public $strDispositivo; # Desktop, Mobile
    public $strOs;
    public $strNavegador;
    public $strHeadersEnviados;
    public $strHeadersRespuesta;
    public $strSemillaBusqueda; # Para acelerar la busqueda si se conoce el nodo DOM base
    public $strHtmlObjetivo;
    public $domRespuesta;
    public $arrPresas = array();
    public $arrNodosTexto;

    public function __construct($strUrlObjetivo = '', $boolPost = FALSE, $boolRespuestaCastNum = TRUE) {
        $this->strUrlObjetivo = $strUrlObjetivo;
        $this->boolPost = $boolPost;
    }

# Regresa un objeto con los resultados
# TODO: Validar propiedades si existe hunt

    public function hunt() {
# URL objetivo, hay que buscURLa

        if ($this->strUrlObjetivo) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $this->strUrlObjetivo);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
            curl_setopt($curl, CURLOPT_HEADER, TRUE);

# Si la petición es GET, construye URL con params, si es post hay
# adicionales pal cURL)

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

# Asigna HTML y DOM respuestas de la petición

            $strRespuestaCurl = curl_exec($curl);
            $intHeaderSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
            $this->strHeadersRespuesta = substr($strRespuestaCurl, 0, $intHeaderSize);
            $this->strHtmlObjetivo = substr($strRespuestaCurl, $intHeaderSize);
            curl_close($curl);
        }

# Ya con el string del html, viel spass

        $this->domRespuesta = HtmlDomParser::str_get_html($this->strHtmlObjetivo);
        if ($this->strSemillaBusqueda) {
            $this->domRespuesta = $this->domRespuesta->find($this->strSemillaBusqueda);
            $this->domRespuesta = $this->domRespuesta[0];
        }
        $this->_findTextNodes();
        $hunted = array();
        foreach ($this->arrPresas as $arrNombreResultadoPresa) {
            $strNombreResultado = $arrNombreResultadoPresa[0];
            $presa = $arrNombreResultadoPresa[1];
            $arrElementosEliminar = array();
            # Hunt Tabla
            if ($presa instanceof Tabla) {
                try {
                    $hunted[$strNombreResultado] = $presa->duckTest($this->domRespuesta);
                } catch (Exception $e) {
                    return array();
                }
            }
            # Hunt KeyValue
            elseif ($presa instanceof KeyValue) {
                $pato = $presa->duckTest($this->arrNodosTexto);
                if (is_numeric($pato) && $boolRespuestaCastNum) {
                    $hunted[$strNombreResultado] = floatval($pato);
                } 
                else if($pato) {
                    $hunted[$strNombreResultado] = $pato;
                }
                # Hunt NodoDom
            } elseif ($presa instanceof NodoDom) {
                $pato = $presa->duckTest($this->domRespuesta);
                if ($pato) {
                    $hunted[$strNombreResultado] = $this->_limpiaStr($pato);
                } else {
                    $hunted[$strNombreResultado] = '';
                }
            }
            # Hunt SelectOptions
            elseif ($presa instanceof SelectOptions) {
                try {
                    $hunted[$strNombreResultado] = $presa->duckTest($this->domRespuesta);
                } catch (Exception $e) {
                    return array();
                }
            }
            # Hunt IdUnico
            elseif ($presa instanceof IdUnico) {
                $pato = $presa->duckTest($this->arrNodosTexto);
                if ($pato) {
                    $hunted[$strNombreResultado] = $pato;
                }
            } else {
                
            }
        }
        return $hunted;
    }

## Para cuando son muchas tablas resultado como en Tránsito DF, no una tabla
## como AICM porque ése sería agregar una Presa de tipo Tabla

    public function huntMuchos() {
        
    }

    private function _findTextNodes() {
        try {
            $this->arrNodosTexto = array();
            $arrTextNodes = $this->domRespuesta->find('text');
            foreach ($arrTextNodes as $nodoTexto) {
                $strNodoSanitizado = $this->_limpiaStr($nodoTexto->plaintext);
                if (!empty($strNodoSanitizado)) {
                    $this->arrNodosTexto[] = $strNodoSanitizado;
                }
            }
        } catch (Exception $e) {
            return new Exception('No hay nodos TXT');
        }
    }

# Quita espacios en blanco '', &nbsp; y tags HTML
# regresa tags HTML que no queremos (</tr>, </td>)

    protected static function _limpiaStr($strTexto) {
        $cur_encoding = mb_detect_encoding($strTexto);
        if ($cur_encoding == 'UTF-8' && mb_check_encoding($strTexto, 'UTF-8')) {
            return strip_tags(trim(str_replace('&nbsp;', '', $strTexto)));
        } else {
            return strip_tags(trim(str_replace('&nbsp;', '', utf8_encode($strTexto))));
        }
    }

}
