<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\KeyValue;
use Ivansabik\DomHunter\IdUnico;

$hunter = new DomHunter('http://www.finanzas.df.gob.mx/sma/detallePlaca.php?placa=912TER');

# Buen candidato para probar huntMuchos()
$presas = array();
$presas[] = array('folio', new IdUnico(11, 'num'));
$presas[] = array('situacion', new KeyValue('pagada', FALSE));
$presas[] = array('motivo', new KeyValue('Motivo'));
$presas[] = array('fundamento', new KeyValue('Fundamento'));
$presas[] = array('sancion', new KeyValue('as de salario m', FALSE));
$hunter->arrPresas = $presas;
$hunted = $hunter->hunt();

echo '<pre>';
var_dump($hunted);
echo '</pre>';
