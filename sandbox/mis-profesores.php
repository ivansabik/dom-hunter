<meta charset="UTF-8" />
<?php
require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\Tabla;

$hunter = new DomHunter('http://www.misprofesores.com/profesores/EDUARDO-TOMAS-ARELLANO-ARJONA_17865');

$columnas = array('fecha ', 'clase', 'facilidad', 'ayuda', 'claridad', 'icon1', 'icon2', 'comentarios', 'palomin');
$arrayPresas[] = array('calificaciones', new Tabla(array('ocurrencia' => 6), $columnas, 2));

$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);

$hunter = new DomHunter('http://www.misprofesores.com/profesores/EDUARDO-TOMAS-ARELLANO-ARJONA_17865?pag=2');
$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);

$hunter = new DomHunter('http://www.misprofesores.com/profesores/EDUARDO-TOMAS-ARELLANO-ARJONA_17865?pag=3');
$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);

$hunter = new DomHunter('http://www.misprofesores.com/profesores/EDUARDO-TOMAS-ARELLANO-ARJONA_17865?pag=4');
$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);

$hunter = new DomHunter('http://www.misprofesores.com/profesores/EDUARDO-TOMAS-ARELLANO-ARJONA_17865?pag=5');
$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);

$hunter = new DomHunter('http://www.misprofesores.com/profesores/EDUARDO-TOMAS-ARELLANO-ARJONA_17865?pag=6');
$hunter->arrPresas = $arrayPresas;
$out = $hunter->hunt();
var_dump($out);
