<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';
require_once './include/funciones.php';

use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\Tabla;
use Ivansabik\DomHunter\KeyValue;
use Ivansabik\DomHunter\IdUnico;
use Ivansabik\DomHunter\NodoDom;

# Config headers y errores
# error_reporting(0);
# header('Content-Type: application/json; charset=utf-8');

# Params iniciales
$params_peticion = array(
    "idioma" => 'es',
    "dispatch" => 'doRastreoInternet'
);

# Agrega numero de guia o codigo de rastreo a params POST
if (!isset($_GET['numero'])) {
    $fields = array(
        "error" => 1,
        "mensaje_error" => "No existe el parámetro numero en la peticion GET",
    );
    die(indent(json_encode($fields)));
}
if (valida('guia')) {
    $params_peticion['guias'] = $_GET['numero'];
    $params_peticion['tipoGuia'] = 'ESTAFETA';
} elseif (valida('rastreo')) {
    $params_peticion['guias'] = $_GET['numero'];
    $params_peticion['tipoGuia'] = 'REFERENCE';
} else {
    $fields = array(
        "error" => 2,
        "mensaje_error" => "Número de guía o código de rastreo no válidos",
    );
    die(indent(json_encode($fields)));
}

$hunter = new DomHunter('http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do', 1);
$hunter->arrParamsPeticion = $params_peticion;

# TODO: Cuando hay respuesta de "No hay informacion disponible"
# Busca coordenadas de origen y destino
$presas = array();
$presas[] = array('numero_guia', new KeyValue('numero de guia'));
$presas[] = array('codigo_rastreo', new KeyValue('digo de rastreo'));
$presas[] = array('origen', new KeyValue('origen'));
$presas[] = array('destino', new KeyValue('destino', TRUE, TRUE));
$presas[] = array('cp_destino', new IdUnico(5, 'num'));
$presas[] = array('servicio', new KeyValue('entrega garantizada', FALSE));
$presas[] = array('estatus', new NodoDom(array('find' => '.respuestasazul'), 'plaintext', 1));
$presas[] = array('fecha_recoleccion', new KeyValue('fecha de recoleccion'));
$presas[] = array('fecha_programada', new KeyValue('de entrega', TRUE, TRUE));
$presas[] = array('fecha_entrega', new KeyValue('Fecha y hora de entrega'));
$presas[] = array('tipo_envio', new KeyValue('tipo de envio'));
$presas[] = array('peso', new KeyValue('Peso kg'));
$presas[] = array('peso_vol', new KeyValue('Peso volumétrico kg'));
$presas[] = array('recibio', new KeyValue('recibi'));
$presas[] = array('dimensiones', new KeyValue('Dimensiones cm'));
$columnas = array('fecha', 'lugar_movimiento', 'comentarios');
$presas[] = array('historial', new Tabla(array('ocurrencia' => -1), $columnas, 3));
$hunter->arrPresas = $presas;
$hunted = $hunter->hunt();
echo '<pre>';
var_dump($hunted);
echo '</pre>';

/*
$coords = geocoder::getLocation($ciudad_origen . ", Mexico");
if ($coords != false) {
    $latitudOrigen = $coords['lat'];
    $longitudOrigen = $coords['lng'];
} else {
    $latitudOrigen = "";
    $longitudOrigen = "";
}
$ciudadDestino = trim(str_replace('&nbsp;', '', $html->find('text', 80)->plaintext));
$coords = geocoder::getLocation($ciudadDestino . ", Mexico");
if ($coords != false) {
    $latitudDestino = $coords['lat'];
    $longitudDestino = $coords['lng'];
} else {
    $latitudDestino = "";
    $longitudDestino = "";
}

// Descomposicion de dimensiones, de string a ancho, alto, largo
$dimensiones = $html->find('text', 252)->plaintext;
$arrDimensiones = explode('x', $dimensiones);
$ancho = $arrDimensiones[0];
$alto = $arrDimensiones[1];
$largo = $arrDimensiones[2];

// Construye respuesta de guia/rastreo encontrado
try {
    $fields = array(
        "numero_guia" => trim(str_replace('&nbsp;', '', $html->find('text', 60)->plaintext)),
        "codigo_rastreo" => trim(str_replace('&nbsp;', '', $html->find('text', 64)->plaintext)),
        "servicio" => trim(str_replace('&nbsp;', '', utf8_encode($html->find('text', 135)->plaintext))),
        "fecha_programada" => trim(str_replace('&nbsp;', '', $html->find('text', 155)->plaintext)),
        "origen" => array(
            "nombre" => trim($html->find('text', 73)->plaintext),
            "latitud" => $latitudOrigen,
            "longitud" => $longitudOrigen
        ),
        "fecha_recoleccion" => trim(str_replace('&nbsp;', '', $html->find('text', 167)->plaintext)),
        "destino" => array(
            "nombre" => trim(str_replace('&nbsp;', '', $html->find('text', 80)->plaintext)),
            "latitud" => $latitudDestino,
            "longitud" => $longitudDestino,
            "codigo_postal" => trim(str_replace('&nbsp;', '', $html->find('text', 84)->plaintext))
        ),
        "estatus_envio" => trim(str_replace('&nbsp;', '', $html->find('text', 97)->plaintext)),
        "fecha_entrega" => trim(str_replace('&nbsp;', '', $html->find('text', 139)->plaintext)),
        // Agregados en el fix de 22.02.14
        "tipo_envio" => trim(str_replace('&nbsp;', '', $html->find('text', 149)->plaintext)),
        "recibio" => trim(str_replace('&nbsp;', '', $html->find('text', 102)->plaintext)),
        "firma_recibido" => 'http://rastreo3.estafeta.com' . $html->find('img', 4)->src,
        "dimensiones" => array(
            "ancho" => $ancho,
            "alto" => $alto,
            "largo" => $largo
        ),
        "peso" => trim(str_replace('&nbsp;', '', $html->find('text', 261)->plaintext)),
        "peso_volumetrico" => trim(str_replace('&nbsp;', '', $html->find('text', 267)->plaintext))
    );
    $fields = limpiaRespuesta($fields);
    echo indent(json_encode($fields));
} catch (Exception $e) {
    $fields = array(
        "error" => 2,
        "mensaje_error" => $e,
    );
    die(indent(json_encode($fields)));
}
 */