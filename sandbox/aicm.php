<?php
require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\Tabla;

$hunter = new DomHunter('http://www.aicm.com.mx/en/flights?da=a&in=n');

$columnas = array('origin', 'airline', 'flight', 'time', 'status', 'gate', 'terminal');
$arrayPresas[] = array('llegadas', new Tabla(array('ocurrencia' => 1), $columnas));

$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);