<?php

require_once '../src/Ivansabik/DomHunter/DomHunter.php';

/**
 * Prueba de DOM Hunter con datos de Estafeta
 *
 * @author ivansabik
 */
class Estafeta5Test extends PHPUnit_Framework_TestCase {

    private $_arrResultadosDomHunter;

    protected function setUp() {
        $hunter = new DomHunter();
        $hunter->strHtmlObjetivo('<table width="88%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td width="13" height="58" valign="top" background="http://www.estafeta.com/imagenes/lineageneralizquierda.png">&nbsp;</td><td width="664" valign="middle" background="http://www.estafeta.com/imagenes/medioazulgeneral.png"><div align="right"><img src="http://www.estafeta.com/imagenes/herramientas.png" width="333" height="31"></div></td><td width="11" valign="top" background="http://www.estafeta.com/imagenes/derechaazulgeneral.png">&nbsp;</td></tr><tr><td height="33" colspan="3" valign="top" background="http://www.estafeta.com/imagenes/separaseccroja.jpg"><div align="left"><img src="http://www.estafeta.com/imagenes/rastreotitulo.png" width="258" height="27"></div></td></tr><tr><td colspan="3" valign="top"><p align="right"><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="http://www.estafeta.com/herramientas/rastreo.aspx">Nueva consulta</a></font></p><div align="left"><form><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Número de guía</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 7013001371460680250303</div></td><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Código de rastreo</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">1873862241</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left">Origen</div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left">Cancún</div></td><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Destino</div></td><td width="35%" colspan="3" class="respuestas"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td height="30" width="50%" bgcolor="#edf0e9"><div align="left" class="respuestas">Villahermosa</div></td><td height="30" width="30%" bgcolor="#d6e3f5" class="titulos">CP Destino</td><td height="30" width="20%" bgcolor="#edf0e9" class="respuestas" align="left">&nbsp;86100</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left">Estatus del servicio</div></td><td width="10%" bgcolor="#edf0e9" class="respuestasazul"><div align="left"><img src="images/palomita.png" border="0" width="50" height="50"></div></td><td width="20%" bgcolor="#edf0e9" class="respuestasazul"><div align="left">Entregado</div></td><td width="16%" height="20" bgcolor="#d6d6d6"><div class="titulos" align="left">Recibió</div></td><td width="25%" colspan="1" bgcolor="#edf0e9"><div class="respuestasazul3" align="left">PDV2:NIDYA JUDTH PEREZ SANCHEZ</div></td><td width="10%" bgcolor="#edf0e9" class="style1"><div align="center"></div></td></tr></tbody></table></td></tr><tr><td align="center" bgcolor="edf0e9"><div class="msg_list"><p style="display: none;" id="7013001371460680250303FIR" class="style1 msg_head "></p><div class="msg_body"></div></div></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Servicio</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">Entrega garantizada al siguiente día hábil (lunes a viernes)</div></td><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha y hora de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="style1"><div align="left" class="respuestas">07/06/2013 03:57 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="16%" bgcolor="#d6d6d6" height="30" class="titulos"><div align="left" class="titulos">Fecha programada <br>de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">Ocurre. El destinatario cuenta con 10 días hábiles para recoger su envío, una vez que este haya sido entregado en la plaza destino.</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Número de orden de recolección</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas"><a href="http://rastreo2.estafeta.com/ShipmentPickUpWeb/actions/pickUpOrder.do?method=doGetPickUpOrder&amp;forward=toPickUpInfo&amp;idioma=es&amp;pickUpId=7053391" class="cuerpo" target="_blank">7053391</a></span></div></td><td width="16%" height="40" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha de recolección</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 14/05/2013 04:20 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Orden de rastreo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">8111128520</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Motivo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Agilizar entrega</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Estatus*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Concluidos</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Resultado*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Envio disponible en oficina Estafeta</span></div></td></tr></tbody></table></td></tr><tr><td><table width="690" align="center" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td class="pies"><div align="left"><span class="pies">*Aclaraciones acerca de su envío</span></div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" rowspan="2" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guías envíos múltiples</span></div></td><td width="33%" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Guía documento de retorno</span></div></td><td width="33%" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guía internacional</span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="repuestas"><div align="center">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Características del envío</span><br><img onclick="darClick(\'7013001371460680250303CAR\')" src="images/caracter_envio.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Historia</span><br><img onclick="darClick(\'7013001371460680250303HIS\')" src="images/historia.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Preguntas frecuentes</span><br><a target="_blank" href="http://www.estafeta.com/herramientas/ayuda.aspx"><img src="images/preguntas.png" border="0" width="75" height="75"></a></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Comprobante de entrega</span><br><a target="_blank" href="/RastreoWebInternet/consultaEnvio.do?dispatch=doComprobanteEntrega&amp;guiaEst=7013001371460680250303"><img src="images/comprobante.png" border="0" width="75" height="75"></a></div></td></tr></tbody></table></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="7013001371460680250303CAR" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Características </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="20" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Dimensiones cm</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0x0x0</span></div></td></tr><tr><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">6.1</span></div></td><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso volumétrico kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0.0</span></div></td></tr><tr><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Referencia cliente</span></div></td><td colspan="3" width="80%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td></tr></tbody></table></div></div></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="7013001371460680250303HIS" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Historia </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="0" cellspacing="1"><tbody><tr><td width="22%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Fecha - Hora</div></td><td width="31%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Lugar - Movimiento</div></td><td width="20%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Comentarios</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">07/06/2013 03:57 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Recolección en oficina por ruta local</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">07/06/2013 03:56 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Envío recibido en oficina</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Envío ocurre direccionado a oficina </div></td></tr></tbody></table></div></div></td></tr></tbody></table><br><hr color="red" width="688px"><br><input type="hidden" name="tipoGuia" value="ESTAFETA&quot;"></form><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"> Versión 4.0 </font></div></td></tr></tbody></table>');
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
        $this->assertEquals('7013001371460680250303', $this->_arrResultadosDomHunter['numero_guia']);
    }

    public function testCodigoRastreo() {
        $this->assertEquals('1873862241', $this->_arrResultadosDomHunter['codigo_rastreo']);
    }

    public function testServicio() {
        $this->assertEquals('Entrega garantizada al siguiente día hábil (lunes a viernes)', $this->_arrResultadosDomHunter['servicio']);
    }

    public function testFechaProgramada() {
        $this->assertEquals('Ocurre. El destinatario cuenta con 10 días hábiles para recoger su envío, una vez que este haya sido entregado en la plaza destino.', $this->_arrResultadosDomHunter['fecha_programada']);
    }

    public function testOrigen() {
        $this->assertEquals('Cancún', $this->_arrResultadosDomHunter['origen']);
    }

    public function testCodigoPostalDestino() {
        $this->assertEquals('86100', $this->_arrResultadosDomHunter['cp_destino']);
    }

    public function testFechaRecoleccion() {
        $this->assertEquals('14/05/2013 04:20 PM', $this->_arrResultadosDomHunter['fecha_recoleccion']);
    }

    public function testDestino() {
        $this->assertEquals('Villahermosa', $this->_arrResultadosDomHunter['destino']);
    }

    public function testEstatusEnvio() {
        $this->assertEquals('Entregado', $this->_arrResultadosDomHunter['estatus']);
    }

    public function testFechaEntrega() {
        $this->assertEquals('07/06/2013 03:57 PM', $this->_arrResultadosDomHunter['fecha_entrega']);
    }

    public function testTipoEnvio() {
        $this->assertEquals('PAQUETE', $this->_arrResultadosDomHunter['tipo_envio']);
    }

    public function testRecibio() {
        $this->assertEquals('PDV2:NIDYA JUDTH PEREZ SANCHEZ', $this->_arrResultadosDomHunter['recibio']);
    }

    public function testFirmaRecibido() {
        $this->assertEquals('', $this->_arrResultadosDomHunter['firma_recibido']);
    }

    public function testPeso() {
        $this->assertEquals('6.1', $this->_arrResultadosDomHunter['peso']);
    }

    public function testPesoVolumetrico() {
        $this->assertEquals('0.0', $this->_arrResultadosDomHunter['peso_vol']);
    }

}
