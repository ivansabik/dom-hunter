<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include '../DOMHunter.php';

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
$hunter->hunt();

echo '<h3>$hunter->strHtmlRespuesta()</h3>';
var_dump($hunter->strHtmlRespuesta());

echo '<h3>$hunter->domRespuesta()</h3>';
if ($hunter->domRespuesta()) {
    echo 'Existe';
}
