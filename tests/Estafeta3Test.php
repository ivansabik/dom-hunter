<?php

require_once '../src/Ivansabik/DomHunter/DomHunter.php';

/**
 * Prueba de DOM Hunter con datos de Estafeta
 *
 * @author ivansabik
 */
class Estafeta3Test extends PHPUnit_Framework_TestCase {

    private $_arrResultadosDomHunter;

    protected function setUp() {
        $hunter = new DomHunter();
        $hunter->strHtmlObjetivo('<table width="88%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td width="13" height="58" valign="top" background="http://www.estafeta.com/imagenes/lineageneralizquierda.png">&nbsp;</td><td width="664" valign="middle" background="http://www.estafeta.com/imagenes/medioazulgeneral.png"><div align="right"><img src="http://www.estafeta.com/imagenes/herramientas.png" width="333" height="31"></div></td><td width="11" valign="top" background="http://www.estafeta.com/imagenes/derechaazulgeneral.png">&nbsp;</td></tr><tr><td height="33" colspan="3" valign="top" background="http://www.estafeta.com/imagenes/separaseccroja.jpg"><div align="left"><img src="http://www.estafeta.com/imagenes/rastreotitulo.png" width="258" height="27"></div></td></tr><tr><td colspan="3" valign="top"><p align="right"><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="http://www.estafeta.com/herramientas/rastreo.aspx">Nueva consulta</a></font></p><div align="left"><form><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Número de guía</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 5155057767126720052603</div></td><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Código de rastreo</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">1601666464</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left">Origen</div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left">Cd. Delicias</div></td><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Destino</div></td><td width="35%" colspan="3" class="respuestas"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td height="30" width="50%" bgcolor="#edf0e9"><div align="left" class="respuestas">Sahuayo</div></td><td height="30" width="30%" bgcolor="#d6e3f5" class="titulos">CP Destino</td><td height="30" width="20%" bgcolor="#edf0e9" class="respuestas" align="left">&nbsp;59510</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left">Estatus del servicio</div></td><td width="10%" bgcolor="#edf0e9" class="respuestasazul"><div align="left"><img src="images/pendiente.png" border="0" width="60" height="29"></div></td><td width="20%" bgcolor="#edf0e9" class="respuestasazul"><div align="left">Pendiente en transito</div></td><td width="16%" bgcolor="#d6d6d6" class="style1"><div class="titulos" align="left">Recibió</div></td><td width="25%" colspan="1" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="10%" bgcolor="#edf0e9" class="style1"><div align="center"></div></td></tr></tbody></table></td></tr><tr><td align="center" bgcolor="edf0e9"><div class="msg_list"><p style="display: none;" id="5155057767126720052603FIR" class="style1 msg_head "></p><div class="msg_body"></div></div></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Servicio</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">Entrega garantizada al tercer día hábil</div></td><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha y hora de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="16%" bgcolor="#d6d6d6" height="30" class="titulos"><div align="left" class="titulos">Fecha programada <br>de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">07/03/2013<br></div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Número de orden de recolección</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="center">&nbsp;</div></td><td width="16%" height="40" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha de recolección</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 04/03/2013 01:17 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Orden de rastreo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">8111089921</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Motivo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Estatus de confirmacion</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Estatus*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Concluidos</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Resultado*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Comunicarse al 01800 37823382</span></div></td></tr></tbody></table></td></tr><tr><td><table width="690" align="center" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td class="pies"><div align="left"><span class="pies">*Aclaraciones acerca de su envío</span></div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" rowspan="2" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guías envíos múltiples</span></div></td><td width="33%" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Guía documento de retorno</span></div></td><td width="33%" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guía internacional</span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="repuestas"><div align="center">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Características del envío</span><br><img onclick="darClick(\'5155057767126720052603CAR\')" src="images/caracter_envio.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Historia</span><br><img onclick="darClick(\'5155057767126720052603HIS\')" src="images/historia.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Preguntas frecuentes</span><br><a target="_blank" href="http://www.estafeta.com/herramientas/ayuda.aspx"><img src="images/preguntas.png" border="0" width="75" height="75"></a></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Comprobante de entrega</span><br><img src="images/comprobante.png" border="0" width="75" height="75"></div></td></tr></tbody></table></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="5155057767126720052603CAR" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Características </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="20" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Dimensiones cm</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0x0x0</span></div></td></tr><tr><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0.0</span></div></td><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso volumétrico kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0.0</span></div></td></tr><tr><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Referencia cliente</span></div></td><td colspan="3" width="80%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td></tr></tbody></table></div></div></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="5155057767126720052603HIS" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Historia </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="0" cellspacing="1"><tbody><tr><td bgcolor="#d6e3f5" class="titulos"><div align="left">Guía</div></td><td bgcolor="#d6e3f5" class="respuestas"><div align="left">5155057767126720052603</div></td></tr><tr><td bgcolor="#edf0e9" class="respuestasazul"><div align="left">No hay información disponible.</div></td><td bgcolor="#d6d6d6" class="respuestas"><div align="left"><a href="http://www.estafeta.com/herramientas/ayuda.aspx" class="enlace" target="_blank">Ayuda</a><a></a></div></td></tr></tbody></table><br></div></div></td></tr></tbody></table><br><hr color="red" width="688px"><br><input type="hidden" name="tipoGuia" value="ESTAFETA&quot;"></form><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"> Versión 4.0 </font></div></td></tr></tbody></table>');
        $arrayPresas = array();
        $arrayPresas[] = array('numero_guia', new KeyValue('numero de guia'));
        $arrayPresas[] = array('codigo_rastreo', new KeyValue('codigo de rastreo'));
        $arrayPresas[] = array('origen', new KeyValue('origen'));
        $arrayPresas[] = array('destino', new KeyValue('destino', TRUE, TRUE));
        $arrayPresas[] = array('cp_destino', new IdUnico(5, 'num'));
        $arrayPresas[] = array('servicio', new KeyValue('entrega garantizada', FALSE));
        $arrayPresas[] = array('estatus', new NodoDom('.respuestasazul', 'plaintext', 1));
        $arrayPresas[] = array('fecha_recoleccion', new KeyValue('fecha de recoleccion'));
        $arrayPresas[] = array('fecha_programada', new KeyValue('de entrega', TRUE, TRUE));
        $arrayPresas[] = array('fecha_entrega', new KeyValue('Fecha y hora de entrega'));
        $arrayPresas[] = array('tipo_envio', new KeyValue('tipo de envio'));
        $arrayPresas[] = array('peso', new KeyValue('Peso kg'));
        $arrayPresas[] = array('peso_vol', new KeyValue('Peso volumétrico kg'));
        //$arrayPresas[] = array('firma_recibido', new NodoDom('img', 'src', 4));
        $arrayPresas[] = array('recibio', new KeyValue('recibio'));
        $hunter->arrPresas($arrayPresas);
        $this->_arrResultadosDomHunter = $hunter->hunt();
    }

    public function testNumeroGuia() {
        $this->assertEquals('5155057767126720052603', $this->_arrResultadosDomHunter['numero_guia']);
    }

    public function testCodigoRastreo() {
        $this->assertEquals('1601666464', $this->_arrResultadosDomHunter['codigo_rastreo']);
    }

    public function testServicio() {
        $this->assertEquals('Entrega garantizada al tercer día hábil', $this->_arrResultadosDomHunter['servicio']);
    }

    public function testFechaProgramada() {
        $this->assertEquals('07/03/2013', $this->_arrResultadosDomHunter['fecha_programada']);
    }

    public function testOrigen() {
        $this->assertEquals('Cd. Delicias', $this->_arrResultadosDomHunter['origen']);
    }

    public function testCodigoPostalDestino() {
        $this->assertEquals('59510', $this->_arrResultadosDomHunter['cp_destino']);
    }

    public function testFechaRecoleccion() {
        $this->assertEquals('04/03/2013 01:17 PM', $this->_arrResultadosDomHunter['fecha_recoleccion']);
    }

    public function testDestino() {
        $this->assertEquals('Sahuayo', $this->_arrResultadosDomHunter['destino']);
    }

    public function testEstatusEnvio() {
        $this->assertEquals('Pendiente en transito', $this->_arrResultadosDomHunter['estatus']);
    }

    public function testFechaEntrega() {
        $this->assertEquals('', $this->_arrResultadosDomHunter['fecha_entrega']);
    }

    public function testTipoEnvio() {
        $this->assertEquals('PAQUETE', $this->_arrResultadosDomHunter['tipo_envio']);
    }

    public function testRecibio() {
        $this->assertEquals('', $this->_arrResultadosDomHunter['recibio']);
    }

    public function testFirmaRecibido() {
        $this->assertEquals('', $this->_arrResultadosDomHunter['firma_recibido']);
    }

    public function testPeso() {
        $this->assertEquals('0.0', $this->_arrResultadosDomHunter['peso']);
    }

    public function testPesoVolumetrico() {
        $this->assertEquals('0.0', $this->_arrResultadosDomHunter['peso_vol']);
    }

}
