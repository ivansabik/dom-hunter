<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../src/dom-hunter/DOMHunter.php';

// Tests muy puñetos para empezar en cortina, cambiar por unit testing serios
// Prueba Estafeta

echo '<h1>Prueba Estafeta</h1>';
$hunter = new DOMHunter('http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do', 1);

$hunter->arrParamsPeticion(
        array(
            'idioma' => 'es',
            'dispatch' => 'doRastreoInternet',
            'tipoGuia' => 'REFERENCE',
            'guias' => '2715597604'
        )
);

$hunter->strSemillaBusqueda('th table');

$hunter->hunt();

echo $hunter->domRespuesta();