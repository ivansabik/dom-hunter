<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\KeyValue;
use Sunra\PhpSimple\HtmlDomParser;

class KeyValueTest {

    private static $_html_transito = '<body><div id="busca_placa"><center><font size="3"><b>PLACA: <span class="titulo">395UYK</span></b></font></center></div><table width="780" align="center" border="1" id="tablaDatos"><thead><tr><th width="150">Folio</th> <th>Fecha de Infracción </th><th colspan="2">Situación</th></tr></thead><tbody><tr><td align="center">01093365526</td><td align="center">2009-10-14</td><td colspan="2" align="center"><span class="pagada">Pagada </span></td></tr><tr><td><b>Motivo:</b></td><td colspan="3"><font size="1.5">POR ESTACIONARSE EN LAS VÍAS PRIMARIAS</font></td></tr><tr><td><b>Fundamento:</b> </td><td colspan="3"><b>Artículo:</b> 12, <b>Fracción:</b> I, <b>Parrafo:</b> , <b>Inciso:</b> </td></tr><tr><td><b>Sanción: </b></td><td colspan="3"><b>5</b> días de salario mínimo</td></tr></tbody></table><br><table width="780" align="center" border="1" id="tablaDatos"><thead><tr><th width="150">Folio</th> <th>Fecha de Infracción </th><th colspan="2">Situación</th></tr></thead><tbody><tr><td align="center">04105952639</td><td align="center">2010-10-22</td><td colspan="2" align="center"><span class="pagada">Pagada </span></td></tr><tr><td><b>Motivo:</b></td><td colspan="3"><font size="1.5">DAR VUELTA A LA IZQUIERDA, DERECHA O EN ¿U¿ CUANDO SE INTERFIERA LOS CORREDORES DEL ¿METROBÚS¿ SALVO QUE EXISTA SEÑALAMIENTO QUE LO PERMITA</font></td></tr><tr><td><b>Fundamento:</b> </td><td colspan="3"><b>Artículo:</b> 6, <b>Fracción:</b> XV, <b>Parrafo:</b> , <b>Inciso:</b> </td></tr><tr><td><b>Sanción: </b></td><td colspan="3"><b>40</b> días de salario mínimo</td></tr></tbody></table><br><table width="780" align="center" border="1" id="tablaDatos"><thead><tr><th width="150">Folio</th> <th>Fecha de Infracción </th><th colspan="2">Situación</th></tr></thead><tbody><tr><td align="center">01110899508</td><td align="center">2011-03-19</td><td colspan="2" align="center"><span class="pagada">Pagada </span></td></tr><tr><td><b>Motivo:</b></td><td colspan="3"><font size="1.5">POR ESTACIONARSE EN ZONAS O VÍAS PÚBLICAS DONDE EXISTA SEÑALIZACIÓN VÍAL RESTRICTIVA</font></td></tr><tr><td><b>Fundamento:</b> </td><td colspan="3"><b>Artículo:</b> 12, <b>Fracción:</b> II, <b>Parrafo:</b> , <b>Inciso:</b> </td></tr><tr><td><b>Sanción: </b></td><td colspan="3"><b>10</b> días de salario mínimo</td></tr></tbody></table><br><table width="780" align="center" border="1" id="tablaDatos"><thead><tr><th width="150">Folio</th> <th>Fecha de Infracción </th><th colspan="2">Situación</th></tr></thead><tbody><tr><td align="center">01093006566</td><td align="center">2009-09-14</td><td colspan="2" align="center"><span class="pagada">Pagada </span></td></tr><tr><td><b>Motivo:</b></td><td colspan="3"><font size="1.5">POR ESTACIONARSE EN LAS VÍAS PRIMARIAS</font></td></tr><tr><td><b>Fundamento:</b> </td><td colspan="3"><b>Artículo:</b> 12, <b>Fracción:</b> I, <b>Parrafo:</b> , <b>Inciso:</b> </td></tr><tr><td><b>Sanción: </b></td><td colspan="3"><b>5</b> días de salario mínimo</td></tr></tbody></table><br><table width="780" align="center" border="1" id="tablaDatos"><thead><tr><th width="150">Folio</th> <th>Fecha de Infracción </th><th colspan="2">Situación</th></tr></thead><tbody><tr><td align="center">01100537892</td><td align="center">2010-02-09</td><td colspan="2" align="center"><span class="pagada">Pagada </span></td></tr><tr><td><b>Motivo:</b></td><td colspan="3"><font size="1.5">POR ESTACIONARSE SOBRE LAS BANQUETAS, CAMELLONES, ANDADORES, RETORNOS, ISLETAS U OTRAS VÍAS Y ESPACIOS RESERVADOS A PEATONES, Y CICLISTAS.</font></td></tr><tr><td><b>Fundamento:</b> </td><td colspan="3"><b>Artículo:</b> 12, <b>Fracción:</b> IX, <b>Parrafo:</b> , <b>Inciso:</b> </td></tr><tr><td><b>Sanción: </b></td><td colspan="3"><b>5</b> días de salario mínimo</td></tr></tbody></table><br><div id="secciones" width="700"><center> TOTAL INFRACCIONES: 5</center></div><br><hr color="#009933"><p>Si usted desea: </p><ul class="listadograleg"><li>1. Conseguir mayor información acerca de las infracciones al reglamento de tránsito mostradas.</li><li>2. Aclarar alguna duda sobre la imposición de la sanción.</li></ul><p>Puede acudir a los siguientes domicilios o teléfonos:</p><ul class="listadogral"><li><b>Oficina de Información de Atención Ciudadana de Infracciones</b>, ubicada en Liverpool 136-PB, Col. Juárez, Del. Cuauhtémoc, entradapor la Glorieta de Insurgentes. Tel. 5242-5100 exts. 4996, 4997 y 4998. Horario de Atención: de 08:00 a 19:00 horas.</li><li><b>Centro de Atención del Secretario de Seguridad Pública del D.F.</b>, ubicado en Londres 107-PB, Col. Juárez, Del. Cuauhtémoc, correoelectrónico: <a href="maailto:sassp@ssp.df.gob.mx">cassp@ssp.df.gob.mx</a>, teléfono: 5208-9898.</li></ul><p>Si usted desea:</p><ul class="listadograleg"><li>1. Corregir o aclarar un pago de sanción ya realizado.</li></ul><p>Puede comunicarse a <b><i>Contributel</i></b> al teléfono 5588-3388, opción 3, o acudir a la Administración Tributaria (AT) más cercana a su domicilio. <a href="http://www.finanzas.df.gob.mx/oficinas/directorioTesorerias.html" style="color:#009933; font-size:13px; text-decoration:underline;">Localizar una AT</a>.</p><hr color="#FFDD00" size="1"><li>La presente información es mostrada sin perjuicio de las facultades de comprobación de las autoridades fiscales.</li><table width="100%" align="center" border="0"><tbody><tr><td align="right"><span class="impresion">2014-06-18 21:33:56</span></td></tr></tbody></table></body>';

    protected function setUp() {
        $this->_dom = HtmlDomParser::str_get_html(self::$_html_estafeta);
    }

    function testDefaults() {
        $kv = new KeyValue('Fracción');
    }

    function testCaseSensitive() {
        $kv = new KeyValue();
        $kv->caseSensitive(true);
    }

    function testKeyExacto() {
        $kv = new KeyValue();
        $kv->exactMatch(true);
    }

    function testAllMatches() {
        $sanciones = array(
            '5 días de salario mínimo',
            '40 días de salario mínimo',
            '10 días de salario mínimo',
            '5 días de salario mínimo',
            '5 días de salario mínimo'
        );
        $kv = new KeyValue('Sancion');
        $this->assertEquals($sanciones, $tabla->duckTest($this->_dom));
    }

    function testReturnNodoAnterior() {
        $kv = new KeyValue('días de salario mínimo');
        $kv->$return_node(-1);
        $this->assertEquals('5', $tabla->duckTest($this->_dom));
    }

    function testNodoDentroNodo() {
        $kv = new KeyValue('días de salario mínimo');
        $kv->parent_plaintext(true);
        $this->assertEquals('5 días de salario mínimo', $tabla->duckTest($this->_dom));
    }

    function testReturnNodoSelf() {
        $kv = new KeyValue('Situación');
        $kv->$return_node(0);
    }

    function testReturnNodeNoExistente() {
        $kv = new KeyValue('Situación');
        $return_node(50);
    }

}

?>
