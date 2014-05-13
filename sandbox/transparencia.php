<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\KeyValue;

$hunter = new DomHunter('http://portaltransparencia.gob.mx/pot/contrataciones/consultarContrato.do?method=consultaContrato&id.idContrato=130767&_idDependencia=12220');

$presas = array();
$presas[] = array('sector_presupuestal', new KeyValue('SECTOR PRESUPUESTAL'));
$presas[] = array('siglas', new KeyValue('SIGLAS'));
$presas[] = array('fecha_actualizacion', new KeyValue('Última fecha de actualizaci'));
$presas[] = array('numero_contrato', new KeyValue('mero de Contrato'));
$presas[] = array('unidad_administrativa', new KeyValue('Unidad administrativa que celebr'));
$presas[] = array('procedimiento_contratacion', new KeyValue('Procedimiento de contrataci'));
$presas[] = array('denominacion_asignado', new KeyValue('n social de la persona moral a que se asig'));
$presas[] = array('fecha_contrato', new KeyValue('Fecha de celebraci'));
$presas[] = array('objeto_contrato', new KeyValue('Objeto de contrato'));
$presas[] = array('monto_contrato', new KeyValue('Monto del contrato'));
$presas[] = array('moneda', new KeyValue('Tipo de Moneda'));
$presas[] = array('fecha_inicio', new KeyValue('Fecha de inicio del contrato'));
$presas[] = array('fecha_fin', new KeyValue('Fecha de terminaci'));
$presas[] = array('documento', new KeyValue('Documento del Contrato'));

$hunter->arrPresas = $presas;
$hunted = $hunter->hunt();

echo '<pre>';
var_dump($hunted);
echo '</pre>';