<?php

require_once '../src/Ivansabik/DomHunter/DomHunter.php';

# Prueba de DOM Hunter con datos de Estafeta

class EstafetaTest extends PHPUnit_Framework_TestCase {

    private $_hunter;

    # TODO: Agregar todos los htmls de prueba y separarlos en un include para que se vea nice

    public static function arrDatos() {
        return array(
            array(
                array(
                    'html' => '<table width="88%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td width="13" height="58" valign="top" background="http://www.estafeta.com/imagenes/lineageneralizquierda.png">&nbsp;</td><td width="664" valign="middle" background="http://www.estafeta.com/imagenes/medioazulgeneral.png"><div align="right"><img src="http://www.estafeta.com/imagenes/herramientas.png" width="333" height="31"></div></td><td width="11" valign="top" background="http://www.estafeta.com/imagenes/derechaazulgeneral.png">&nbsp;</td></tr><tr><td height="33" colspan="3" valign="top" background="http://www.estafeta.com/imagenes/separaseccroja.jpg"><div align="left"><img src="http://www.estafeta.com/imagenes/rastreotitulo.png" width="258" height="27"></div></td></tr><tr><td colspan="3" valign="top"><p align="right"><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="http://www.estafeta.com/herramientas/rastreo.aspx">Nueva consulta</a></font></p><div align="left"><form><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Número de guía</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 6058277365651709009524</div></td><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Código de rastreo</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">0738266367</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left">Origen</div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left">MEXICO D.F.</div></td><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Destino</div></td><td width="35%" colspan="3" class="respuestas"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td height="30" width="50%" bgcolor="#edf0e9"><div align="left" class="respuestas">Estación Aérea MEX</div></td><td height="30" width="30%" bgcolor="#d6e3f5" class="titulos">CP Destino</td><td height="30" width="20%" bgcolor="#edf0e9" class="respuestas" align="left">&nbsp;55230</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left">Estatus del servicio</div></td><td width="10%" bgcolor="#edf0e9" class="respuestasazul"><div align="left"><img src="images/palomita.png" border="0" width="50" height="50"></div></td><td width="20%" bgcolor="#edf0e9" class="respuestasazul"><div align="left">Entregado</div></td><td width="16%" height="20" bgcolor="#d6d6d6"><div class="titulos" align="left">Recibió</div></td><td width="25%" colspan="1" bgcolor="#edf0e9"><div class="respuestasazul3" align="left">PDV2:LASCAREZ MARTINEZ ENRIQUE </div></td><td width="10%" bgcolor="#edf0e9" class="style1"><div align="center"></div></td></tr></tbody></table></td></tr><tr><td align="center" bgcolor="edf0e9"><div class="msg_list"><p style="display: none;" id="6058277365651709009524FIR" class="style1 msg_head "></p><div class="msg_body"></div></div></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Servicio</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">Entrega garantizada de 2 a 5 días hábiles (según distancia)</div></td><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha y hora de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="style1"><div align="left" class="respuestas">28/11/2013 02:30 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="16%" bgcolor="#d6d6d6" height="30" class="titulos"><div align="left" class="titulos">Fecha programada <br>de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">Ocurre. El destinatario cuenta con 10 días hábiles para recoger su envío, una vez que este haya sido entregado en la plaza destino.</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Número de orden de recolección</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas"><a href="http://rastreo2.estafeta.com/ShipmentPickUpWeb/actions/pickUpOrder.do?method=doGetPickUpOrder&amp;forward=toPickUpInfo&amp;idioma=es&amp;pickUpId=8058829" class="cuerpo" target="_blank">8058829</a></span></div></td><td width="16%" height="40" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha de recolección</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 21/11/2013 05:32 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Orden de rastreo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">8111262177</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Motivo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Coordinar a oficina Estafeta</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Estatus*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Concluidos</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Resultado*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Envio disponible en oficina Estafeta</span></div></td></tr></tbody></table></td></tr><tr><td><table width="690" align="center" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td class="pies"><div align="left"><span class="pies">*Aclaraciones acerca de su envío</span></div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" rowspan="2" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guías envíos múltiples</span></div></td><td width="33%" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Guía documento de retorno</span></div></td><td width="33%" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guía internacional</span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="repuestas"><div align="center">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Características del envío</span><br><img onclick="darClick(\'6058277365651709009524CAR\')" src="images/caracter_envio.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Historia</span><br><img onclick="darClick(\'6058277365651709009524HIS\')" src="images/historia.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Preguntas frecuentes</span><br><a target="_blank" href="http://www.estafeta.com/herramientas/ayuda.aspx"><img src="images/preguntas.png" border="0" width="75" height="75"></a></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Comprobante de entrega</span><br><a target="_blank" href="/RastreoWebInternet/consultaEnvio.do?dispatch=doComprobanteEntrega&amp;guiaEst=6058277365651709009524"><img src="images/comprobante.png" border="0" width="75" height="75"></a></div></td></tr></tbody></table></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="6058277365651709009524CAR" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Características </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="20" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Dimensiones cm</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0x0x0</span></div></td></tr><tr><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0.2</span></div></td><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso volumétrico kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0.0</span></div></td></tr><tr><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Referencia cliente</span></div></td><td colspan="3" width="80%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td></tr></tbody></table></div></div></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="6058277365651709009524HIS" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Historia </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="0" cellspacing="1"><tbody><tr><td width="22%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Fecha - Hora</div></td><td width="31%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Lugar - Movimiento</div></td><td width="20%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Comentarios</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">28/11/2013 02:30 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Recolección en oficina por ruta local</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">28/11/2013 12:19 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Envío recibido en oficina</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Envío ocurre direccionado a oficina </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">27/11/2013 07:18 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Carga Aerea AER Aclaración en proceso</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Comunicarse al 01800 3782 338 </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">27/11/2013 04:18 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Envío recibido en oficina</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Envío ocurre direccionado a oficina </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">27/11/2013 09:19 AM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Estación Aérea MEX En proceso de entrega Av Central 161 Impulsora Popular Avicola Nezahualcoyotl</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Envío ocurre direccionado a oficina </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">27/11/2013 07:24 AM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Estación Aérea MEX Llegada a centro de distribución AMX Estación Aérea MEX</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">26/11/2013 07:05 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. En ruta foránea hacia MX2-México (zona 2)</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">26/11/2013 07:03 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Llegada a centro de distribución MEX MEXICO D.F.</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">26/11/2013 06:55 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento en centro de distribución</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Envío en proceso de entrega </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">26/11/2013 06:55 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento en centro de distribución</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Recibe el área de Operaciones </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">26/11/2013 03:17 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Aclaración en proceso</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Reporte generado por el cliente </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">23/11/2013 10:42 AM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento Local</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Auditoria a ruta local </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">22/11/2013 12:00 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento en centro de distribución</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Entrada a Control de Envíos </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">22/11/2013 11:33 AM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento Local</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Entrega en Zona de Alto Riesgo y/o de difícil acceso </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">22/11/2013 11:05 AM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento en centro de distribución</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Posible demora en la entrega por mal empaque </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">22/11/2013 10:58 AM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento Local</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Entrega en Zona de Alto Riesgo y/o de difícil acceso </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">21/11/2013 07:00 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento en centro de distribución</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Envío pendiente de salida a ruta local </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">21/11/2013 06:56 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Llegada a centro de distribución MEX MEXICO D.F.</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr></tbody></table></div></div></td></tr></tbody></table><br><hr color="red" width="688px"><br><input type="hidden" name="tipoGuia" value="ESTAFETA&quot;"></form><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"> Versión 4.0 </font></div></td></tr></tbody></table>',
                    'numero_guia' => '6058277365651709009524',
                    'codigo_rastreo' => '0738266367',
                    'servicio' => 'Entrega garantizada de 2 a 5 días hábiles (según distancia)',
                    'fecha_programada' => 'Ocurre. El destinatario cuenta con 10 días hábiles para recoger su envío, una vez que este haya sido entregado en la plaza destino.',
                    'origen' => 'MEXICO D.F.',
                    'cp_destino' => '55230',
                    'fecha_recoleccion' => '21/11/2013 05:32 PM',
                    'destino' => 'Estación Aérea MEX',
                    'estatus' => 'Entregado',
                    'fecha_entrega' => '28/11/2013 02:30 PM',
                    'tipo_envio' => 'PAQUETE',
                    'recibio' => 'PDV2:LASCAREZ MARTINEZ ENRIQUE',
                    'firma_recibido' => '',
                    'peso' => '0.2',
                    'peso_vol' => '0.0',
                    'historial' => array(
                        array('fecha' => '28/11/2013 02:30 PM', 'lugar_movimiento' => 'Recolección en oficina por ruta local', 'comentarios' => ''),
                        array('fecha' => '28/11/2013 12:19 PM', 'lugar_movimiento' => 'Envío recibido en oficina', 'comentarios' => 'Envío ocurre direccionado a oficina'),
                        array('fecha' => '27/11/2013 07:18 PM', 'lugar_movimiento' => 'Carga Aerea AER Aclaración en proceso', 'comentarios' => 'Comunicarse al 01800 3782 338'),
                        array('fecha' => '27/11/2013 04:18 PM', 'lugar_movimiento' => 'Envío recibido en oficina', 'comentarios' => 'Envío ocurre direccionado a oficina'),
                        array('fecha' => '27/11/2013 09:19 AM', 'lugar_movimiento' => 'Estación Aérea MEX En proceso de entrega Av Central 161 Impulsora Popular Avicola Nezahualcoyotl', 'comentarios' => 'Envío ocurre direccionado a oficina'),
                        array('fecha' => '27/11/2013 07:24 AM', 'lugar_movimiento' => 'Estación Aérea MEX Llegada a centro de distribución AMX Estación Aérea MEX', 'comentarios' => ''),
                        array('fecha' => '26/11/2013 07:05 PM', 'lugar_movimiento' => 'MEXICO D.F. En ruta foránea hacia MX2-México (zona 2)', 'comentarios' => ''),
                        array('fecha' => '26/11/2013 07:03 PM', 'lugar_movimiento' => 'MEXICO D.F. Llegada a centro de distribución MEX MEXICO D.F.', ''),
                        array('fecha' => '26/11/2013 06:55 PM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento en centro de distribución', 'comentarios' => 'Envío en proceso de entrega'),
                        array('fecha' => '26/11/2013 06:55 PM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento en centro de distribución', 'comentarios' => 'Recibe el área de Operaciones'),
                        array('fecha' => '26/11/2013 03:17 PM', 'lugar_movimiento' => 'MEXICO D.F. Aclaración en proceso', 'comentarios' => 'Reporte generado por el cliente'),
                        array('fecha' => '23/11/2013 10:42 AM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento Local', 'comentarios' => 'Auditoria a ruta local'),
                        array('fecha' => '22/11/2013 12:00 PM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento en centro de distribución', 'comentarios' => 'Entrada a Control de Envíos'),
                        array('fecha' => '22/11/2013 11:33 AM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento Local', 'comentarios' => 'Entrega en Zona de Alto Riesgo y/o de difícil acceso'),
                        array('fecha' => '22/11/2013 11:05 AM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento en centro de distribución', 'comentarios' => 'Posible demora en la entrega por mal empaque'),
                        array('fecha' => '22/11/2013 10:58 AM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento Local', 'comentarios' => 'Entrega en Zona de Alto Riesgo y/o de difícil acceso'),
                        array('fecha' => '21/11/2013 07:00 PM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento en centro de distribución', 'comentarios' => 'Envío pendiente de salida a ruta local'),
                        array('fecha' => '21/11/2013 06:56 PM', 'lugar_movimiento' => 'MEXICO D.F. Llegada a centro de distribución MEX MEXICO D.F.', 'comentarios' => ''),
                    )
                )
            ),
            array(
                array(
                    'html' => '<table width="88%" border="0" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td width="13" height="58" valign="top" background="http://www.estafeta.com/imagenes/lineageneralizquierda.png">&nbsp;</td><td width="664" valign="middle" background="http://www.estafeta.com/imagenes/medioazulgeneral.png"><div align="right"><img src="http://www.estafeta.com/imagenes/herramientas.png" width="333" height="31"></div></td><td width="11" valign="top" background="http://www.estafeta.com/imagenes/derechaazulgeneral.png">&nbsp;</td></tr><tr><td height="33" colspan="3" valign="top" background="http://www.estafeta.com/imagenes/separaseccroja.jpg"><div align="left"><img src="http://www.estafeta.com/imagenes/rastreotitulo.png" width="258" height="27"></div></td></tr><tr><td colspan="3" valign="top"><p align="right"><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="http://www.estafeta.com/herramientas/rastreo.aspx">Nueva consulta</a></font></p><div align="left"><form><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Número de guía</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 8055241528464720115088</div></td><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left" class="titulos">Código de rastreo</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">2715597604</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="1" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left">Origen</div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left">México (zona 2)</div></td><td width="16%" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Destino</div></td><td width="35%" colspan="3" class="respuestas"><table width="100%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td height="30" width="50%" bgcolor="#edf0e9"><div align="left" class="respuestas">MEXICO D.F.</div></td><td height="30" width="30%" bgcolor="#d6e3f5" class="titulos">CP Destino</td><td height="30" width="20%" bgcolor="#edf0e9" class="respuestas" align="left">&nbsp;01210</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" bgcolor="#d6d6d6" class="titulos"><div align="left">Estatus del servicio</div></td><td width="10%" bgcolor="#edf0e9" class="respuestasazul"><div align="left"><img src="images/palomita.png" border="0" width="50" height="50"></div></td><td width="20%" bgcolor="#edf0e9" class="respuestasazul"><div align="left">Entregado</div></td><td width="16%" height="20" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Recibió</span></div></td><td width="25%" colspan="1" bgcolor="#edf0e9"><div class="respuestasazul2" align="left">SDR:RAUL MARTIN </div></td><td width="10%" bgcolor="#edf0e9" class="style1"><div align="center"><img src="images/firma.png" onclick="darClick(\2715597604FIR\)" style="cursor:pointer;" width="50" height="50"></div></td></tr></tbody></table></td></tr><tr><td align="center" bgcolor="edf0e9"><div class="msg_list"><p style="display: none;" id="2715597604FIR" class="style1 msg_head "></p><div class="msg_body"><table width="30%" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td height="3"></td></tr><tr><td width="14%" height="16" bgcolor="CC0000" class="style1"><div align="left"><span class="style5">Firma de Recibido</span></div></td></tr><tr><td><img src="/RastreoWebInternet/firmaServlet?guia=8055241528464720115088&amp;idioma=es" width="224" height="120"></td></tr><tr><td height="3"></td></tr></tbody></table></div></div></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Servicio</div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">Entrega garantizada al tercer día hábil</div></td><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha y hora de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="style1"><div align="left" class="respuestas">31/10/2013 12:13 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="16%" bgcolor="#d6d6d6" height="30" class="titulos"><div align="left" class="titulos">Fecha programada <br>de entrega</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas">04/11/2013<br></div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Número de orden de recolección</span></div></td><td width="30%" colspan="2" bgcolor="#edf0e9" class="respuestas"><div align="center">&nbsp;</div></td><td width="16%" height="40" bgcolor="#d6e3f5" class="titulos"><div align="left" class="titulos">Fecha de recolección</div></td><td width="35%" colspan="3" bgcolor="#edf0e9" class="respuestas"><div align="left" class="respuestas"> 30/10/2013 02:00 PM</div></td></tr></tbody></table></td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Orden de rastreo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">8111261466</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Motivo*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Verificacion de domicilio</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6d6d6" class="titulos"><div align="left"><span class="titulos">Estatus*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Concluidos</span></div></td></tr><tr><td width="16%" height="30" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Resultado*</span></div></td><td width="81%" colspan="6" height="30" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">Falta de datos para contactar al cliente</span></div></td></tr></tbody></table></td></tr><tr><td><table width="690" align="center" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td class="pies"><div align="left"><span class="pies">*Aclaraciones acerca de su envío</span></div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" rowspan="2" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guías envíos múltiples</span></div></td><td width="33%" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Guía documento de retorno</span></div></td><td width="33%" bgcolor="#d6d6d6" class="titulos"><div align="center"><span class="titulos">Guía internacional</span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td><td width="33%" bgcolor="#edf0e9" class="repuestas"><div align="center">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td>&nbsp;</td></tr><tr><td><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Características del envío</span><br><img onclick="darClick(\2715597604CAR\)" src="images/caracter_envio.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Historia</span><br><img onclick="darClick(\2715597604HIS\)" src="images/historia.png" style="cursor:pointer;" border="0" width="75" height="75"></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Preguntas frecuentes</span><br><a target="_blank" href="http://www.estafeta.com/herramientas/ayuda.aspx"><img src="images/preguntas.png" border="0" width="75" height="75"></a></div></td><td width="20%" rowspan="3" bgcolor="#d6e3f5" class="titulos"><div align="center"><span class="titulos">Comprobante de entrega</span><br><a target="_blank" href="/RastreoWebInternet/consultaEnvio.do?dispatch=doComprobanteEntrega&amp;guiaEst=8055241528464720115088"><img src="images/comprobante.png" border="0" width="75" height="75"></a></div></td></tr></tbody></table></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="2715597604CAR" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Características </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="16%" height="20" bgcolor="#d6e3f5" class="titulos"><div align="left"><span class="titulos">Tipo de envío</span></div></td><td width="30%" bgcolor="#edf0e9" class="respuestas"><div align="left"><span class="respuestas">PAQUETE</span></div></td><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Dimensiones cm</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">50x14x14</span></div></td></tr><tr><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">0.7</span></div></td><td width="20%" bgcolor="#d6d6d6" class="style1"><div align="left"><span class="titulos">Peso volumétrico kg</span></div></td><td width="30%" bgcolor="#edf0e9" class="style1"><div align="left"><span class="respuestas">1.9</span></div></td></tr><tr><td width="20%" bgcolor="#d6e3f5" class="style1"><div align="left"><span class="titulos">Referencia cliente</span></div></td><td colspan="3" width="80%" bgcolor="#edf0e9" class="style1"><div align="center">&nbsp;</div></td></tr></tbody></table></div></div></td></tr><tr><td><div class="msg_list"><p style="display: none;" id="2715597604HIS" class="style1 msg_head "></p><div class="msg_body"><table width="100%" border="0" cellpadding="2" cellspacing="1"><tbody><tr><td width="20%" rowspan="3" bgcolor="#d6d6d6" class="style1"><div align="center"><span class="titulos">Historia </span></div></td></tr></tbody></table><table width="100%" border="0" cellpadding="0" cellspacing="1"><tbody><tr><td width="22%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Fecha - Hora</div></td><td width="31%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Lugar - Movimiento</div></td><td width="20%" height="23" bgcolor="#d6d6d6" class="titulos"><div align="center">Comentarios</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">26/11/2013 02:31 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Aclaración en proceso</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Comunicarse al 01800 3782 338 </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">26/11/2013 10:49 AM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Aclaración en proceso</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Reporte generado por el cliente </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">31/10/2013 10:04 AM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Recolección en oficina por ruta local</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">31/10/2013 09:12 AM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. En proceso de entrega MEX MEXICO D.F.</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">30/10/2013 08:39 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> MEXICO D.F. Movimiento en centro de distribución</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">Envío con manejo especial </div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">30/10/2013 07:52 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> MEXICO D.F. Llegada a centro de distribución MEX MEXICO D.F.</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">30/10/2013 06:06 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Recolección en oficina por ruta local</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr><tr><td bgcolor="#d6e3f5" class="style1"><div class="respuestasNormal" align="left">30/10/2013 06:02 PM</div></td><td bgcolor="#d6e3f5" class="respuestasNormal"><div align="left"> Envío recibido en oficina</div></td><td bgcolor="#d6e3f5" class="style1"><div align="left" class="respuestasNormal">Envío recibido en oficina de Estafeta fuera del horario de recolección </div></td></tr><tr><td bgcolor="#e3e3e3" class="style1"><div class="respuestasNormal" align="left">30/10/2013 02:00 PM</div></td><td bgcolor="#e3e3e3" class="respuestasNormal"><div align="left"> Envio recibido en oficina Av Adolfo Lopez Mateos 22 Local 4 Puente de Vigas Tlalnepantla</div></td><td bgcolor="#e3e3e3" class="style1"><div align="left" class="respuestasNormal">&nbsp;</div></td></tr></tbody></table></div></div></td></tr></tbody></table><br><hr color="red" width="688px"><br><input type="hidden" name="tipoGuia" value="REFERENCE&quot;"></form><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="1"> Versión 4.0 </font></div></td></tr></tbody></table>',
                    'numero_guia' => '8055241528464720115088',
                    'codigo_rastreo' => '2715597604',
                    'servicio' => 'Entrega garantizada al tercer día hábil',
                    'fecha_programada' => '04/11/2013',
                    'origen' => 'México (zona 2)',
                    'cp_destino' => '01210',
                    'fecha_recoleccion' => '30/10/2013 02:00 PM',
                    'destino' => 'MEXICO D.F.',
                    'estatus' => 'Entregado',
                    'fecha_entrega' => '31/10/2013 12:13 PM',
                    'tipo_envio' => 'PAQUETE',
                    'recibio' => 'SDR:RAUL MARTIN',
                    'firma_recibido' => '/RastreoWebInternet/firmaServlet?guia=8055241528464720115088&idioma=es',
                    'peso' => '0.7',
                    'peso_vol' => '1.9',
                    'historial' => array(
                        array('fecha' => '26/11/2013 02:31 PM', 'lugar_movimiento' => 'MEXICO D.F. Aclaración en proceso', 'comentarios' => 'Comunicarse al 01800 3782 338'),
                        array('fecha' => '26/11/2013 10:49 AM', 'lugar_movimiento' => 'MEXICO D.F. Aclaración en proceso', 'comentarios' => 'Reporte generado por el cliente'),
                        array('fecha' => '31/10/2013 10:04 AM', 'lugar_movimiento' => 'Recolección en oficina por ruta local', 'comentarios' => ''),
                        array('fecha' => '31/10/2013 09:12 AM', 'lugar_movimiento' => 'MEXICO D.F. En proceso de entrega MEX MEXICO D.F.', 'comentarios' => ''),
                        array('fecha' => '30/10/2013 08:39 PM', 'lugar_movimiento' => 'MEXICO D.F. Movimiento en centro de distribución', 'comentarios' => 'Envío con manejo especial'),
                        array('fecha' => '30/10/2013 07:52 PM', 'lugar_movimiento' => 'MEXICO D.F. Llegada a centro de distribución MEX MEXICO D.F.', 'comentarios' => ''),
                        array('fecha' => '30/10/2013 06:06 PM', 'lugar_movimiento' => 'Recolección en oficina por ruta local', 'comentarios' => ''),
                        array('fecha' => '30/10/2013 06:02 PM', 'lugar_movimiento' => 'Envío recibido en oficina', 'comentarios' => 'Envío recibido en oficina de Estafeta fuera del horario de recolección'),
                        array('fecha' => '30/10/2013 02:00 PM', 'lugar_movimiento' => 'Envio recibido en oficina Av Adolfo Lopez Mateos 22 Local 4 Puente de Vigas Tlalnepantla', 'comentarios' => ''),
                    ),
                )
            )
        );
    }

    protected function setUp() {
        $this->_hunter = new DomHunter();
        $arrayPresas = array();
        $arrayPresas[] = array('numero_guia', new KeyValue('numero de guia'));
        $arrayPresas[] = array('codigo_rastreo', new KeyValue('codigo de rastreo'));
        $arrayPresas[] = array('origen', new KeyValue('origen'));
        $arrayPresas[] = array('destino', new KeyValue('destino', TRUE, TRUE));
        $arrayPresas[] = array('cp_destino', new IdUnico(5, 'num'));
        $arrayPresas[] = array('servicio', new KeyValue('entrega garantizada', FALSE));
        $arrayPresas[] = array('estatus', new NodoDom(array('find' => '.respuestasazul'), 'plaintext', 1));
        $arrayPresas[] = array('fecha_recoleccion', new KeyValue('fecha de recoleccion'));
        $arrayPresas[] = array('fecha_programada', new KeyValue('de entrega', TRUE, TRUE));
        $arrayPresas[] = array('fecha_entrega', new KeyValue('Fecha y hora de entrega'));
        $arrayPresas[] = array('tipo_envio', new KeyValue('tipo de envio'));
        $arrayPresas[] = array('peso', new KeyValue('Peso kg'));
        $arrayPresas[] = array('peso_vol', new KeyValue('Peso volumétrico kg'));
        $arrayPresas[] = array('recibio', new KeyValue('recibio'));
        $arrayPresas[] = array('historial', new Tabla(array('ocurrencia' => -1), 3));
        $this->_hunter->arrPresas->$arrayPresas;
    }

    # @dataProvider arrDatos

    public function testNumeroGuia($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['numero_guia'], $resultados['numero_guia']);
    }

    # @dataProvider arrDatos

    public function testCodigoRastreo($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['codigo_rastreo'], $resultados['codigo_rastreo']);
    }

    # @dataProvider arrDatos

    public function testServicio($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['servicio'], $resultados['servicio']);
    }

    # @dataProvider arrDatos

    public function testFechaProgramada($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['fecha_programada'], $resultados['fecha_programada']);
    }

    # @dataProvider arrDatos

    public function testOrigen($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['origen'], $resultados['origen']);
    }

    # @dataProvider arrDatos

    public function testCodigoPostalDestino($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['cp_destino'], $resultados['cp_destino']);
    }

    # @dataProvider arrDatos

    public function testFechaRecoleccion($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['fecha_recoleccion'], $resultados['fecha_recoleccion']);
    }

    # @dataProvider arrDatos

    public function testDestino($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['destino'], $resultados['destino']);
    }

    # @dataProvider arrDatos

    public function testEstatusEnvio($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['estatus'], $resultados['estatus']);
    }

    # @dataProvider arrDatos

    public function testFechaEntrega($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['fecha_entrega'], $resultados['fecha_entrega']);
    }

    # @dataProvider arrDatos

    public function testTipoEnvio($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['tipo_envio'], $resultados['tipo_envio']);
    }

    # @dataProvider arrDatos

    public function testRecibio($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['recibio'], $resultados['recibio']);
    }

    # @dataProvider arrDatos

    public function testFirmaRecibido($arrDatos) {
        $arrayPresas = array();
        $opcionesQuery = array('getElementById' => $arrDatos['codigo_rastreo'] . 'FIR', 'nextSibling' => '', 'find' => 'img');
        $arrayPresas[] = array('firma_recibido', new NodoDom(array('navegacion' => $opcionesQuery), 'src'));
        $this->_hunter->arrPresas->$arrayPresas;
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['firma_recibido'], $resultados['firma_recibido']);
    }

    # @dataProvider arrDatos

    public function testPeso($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['peso'], $resultados['peso']);
    }

    # @dataProvider arrDatos

    public function testPesoVolumetrico($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        $this->assertEquals($arrDatos['peso_vol'], $resultados['peso_vol']);
    }

    # @dataProvider arrDatos

    public function testHistorial($arrDatos) {
        $this->_hunter->strHtmlObjetivo->$arrDatos['html'];
        $resultados = $this->_hunter->hunt();
        //var_export($resultados);
        $this->assertEquals($arrDatos['historial'], $resultados['historial']);
    }

}
