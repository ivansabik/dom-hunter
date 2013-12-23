<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include '../DOMHunter.php';

// Tests muy puñetos para empezar en cortina, cambiar por unit testing serios
// Prueba AICM

echo '<h1>Prueba AICM</h1>';
$hunter = new DOMHunter('http://www.aicm.com.mx/vuelos');

$hunter->strSemillaBusqueda('table');

$hunter->hunt();

echo '<h3>$hunter->domRespuesta()</h3>';
echo $hunter->domRespuesta();
