<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\Tabla;
use Sunra\PhpSimple\HtmlDomParser;

# Prueba la clase Tabla

class TablaTest extends PHPUnit_Framework_TestCase {

    private $_dom;
    private static $_arrTablaPrueba = array(
        array('fecha' => '12/02/2014 09:14 AM', 'lugar_movimiento' => 'MEXICO D.F. En proceso de entrega MEX MEXICO D.F.', 'comentarios' => ''),
        array('fecha' => '12/02/2014 08:27 AM', 'lugar_movimiento' => 'MEXICO D.F. Llegada a centro de distribución', 'comentarios' => 'Envío en proceso de entrega'),
        array('fecha' => '11/02/2014 11:43 PM', 'lugar_movimiento' => 'Centro de Int. SLP En ruta foránea hacia MEX-MEXICO D.F.', 'comentarios' => ''),
        array('fecha' => '08/02/2014 12:49 PM', 'lugar_movimiento' => 'Recolección en oficina por ruta local', 'comentarios' => ''),
        array('fecha' => '07/02/2014 06:26 PM', 'lugar_movimiento' => 'Tijuana En ruta foránea hacia MEX-MEXICO D.F.', 'comentarios' => ''),
        array('fecha' => '07/02/2014 05:04 PM', 'lugar_movimiento' => 'Envío recibido en oficina', 'comentarios' => 'Envío recibido en oficina de Estafeta fuera del horario de recolección'),
        array('fecha' => '07/02/2014 04:58 PM', 'lugar_movimiento' => 'Recolección en oficina por ruta local', 'comentarios' => ''),
        array('fecha' => '07/02/2014 04:43 PM', 'lugar_movimiento' => 'Envio recibido en oficina CARRETERA AL AEROPUERTO AEROPUERTO TIJUANA BC', 'comentarios' => '')
    );

    protected function setUp() {
        $strHtml = '<table width="100%" border="0" cellpadding="0" cellspacing="1"> <tbody><tr> <td width="22%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Fecha - Hora</div></td> <td width="31%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Lugar - Movimiento</div></td> <td width="20%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Comentarios</div></td> </tr> <tr> <td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">12/02/2014 09:14 AM</div></td> <td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. En proceso de entrega MEX MEXICO D.F.</div></td> <td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp; </div></td></tr> <tr> <td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">12/02/2014 08:27 AM</div></td> <td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Llegada a centro de distribución</div></td> <td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Envío en proceso de entrega </div></td></tr> <tr> <td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">11/02/2014 11:43 PM</div></td> <td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Centro de Int. SLP En ruta foránea hacia MEX-MEXICO D.F.</div></td> <td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp; </div></td></tr> <tr> <td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">08/02/2014 12:49 PM</div></td> <td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Recolección en oficina por ruta local</div></td> <td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp; </div></td></tr> <tr> <td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">07/02/2014 06:26 PM</div></td> <td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Tijuana En ruta foránea hacia MEX-MEXICO D.F.</div></td> <td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp; </div></td></tr> <tr> <td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">07/02/2014 05:04 PM</div></td> <td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Envío recibido en oficina</div></td> <td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Envío recibido en oficina de Estafeta fuera del horario de recolección </div></td></tr> <tr> <td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">07/02/2014 04:58 PM</div></td> <td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Recolección en oficina por ruta local</div></td> <td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp; </div></td></tr> <tr> <td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">07/02/2014 04:43 PM</div></td> <td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Envio recibido en oficina CARRETERA AL AEROPUERTO AEROPUERTO TIJUANA BC</div></td> <td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp; </div></td></tr> </tbody></table>';
        $this->_dom = HtmlDomParser::str_get_html($strHtml);
    }

    public function testNavegacion() {
        $opcionesQuery = array('getElementById' => '3208544064715720055515HIS', 'nextSibling' => '', 'lastChild' => '');
        $opcionesTabla = array('navegacion' => $opcionesQuery);
        $columnas = array('fecha', 'lugar_movimiento', 'comentarios');
        $tabla = new Tabla($opcionesTabla, $columnas, 3);
        $this->assertEquals(self::$_arrTablaPrueba, $tabla->duckTest($this->_dom));
    }

    public function testOcurrenciaNumero() {
        $opcionesTabla = array('ocurrencia' => 1);
        $columnas = array('fecha', 'lugar_movimiento', 'comentarios');
        $tabla = new Tabla($opcionesTabla, $columnas, 3);
        $this->assertEquals(self::$_arrTablaPrueba, $tabla->duckTest($this->_dom));
    }

    public function testOcurrenciaUltimo() {
        $opcionesTabla = array('ocurrencia' => -1);
        $columnas = array('fecha', 'lugar_movimiento', 'comentarios');
        $tabla = new Tabla($opcionesTabla, $columnas, 3);
        $this->assertEquals(self::$_arrTablaPrueba, $tabla->duckTest($this->_dom));
    }

    public function testNumOcurrenciaInvalido() {
        $this->markTestIncomplete('testNumOcurrenciaInvalido() no esta definido');
    }

    public function testResultadoQueryNoTable() {
        $this->markTestIncomplete('testResultadoQueryNoTable() no esta definido');
    }

    public function testSkipTitulos() {
        $this->markTestIncomplete('testSkipTitulos() no esta definido');
    }

}
