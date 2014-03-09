<?php

/**
 * Prueba de DOM Hunter con datos de Estafeta
 *
 * @author ivansabik
 */
class EstafetaTest {
    
    private $_arrResultadosDomHunter;

    protected function setUp() {
        $hunter = new DOMHunter('http://rastreo3.estafeta.com/RastreoWebInternet/consultaEnvio.do', 1);
        $hunter->arrParamsPeticion(
                array(
                    'idioma' => 'es',
                    'dispatch' => 'doRastreoInternet',
                    'tipoGuia' => 'REFERENCE',
                    'guias' => '2715597604'
                )
        );
        $arrayPresas = array();
        $arrayPresas[] = array('numeroGuia', new IdUnico(10, 'int')); // Número de guía
        $arrayPresas[] = array('codigoRastreo', new IdUnico(20, 'int')); // Código de rastreo
        $arrayPresas[] = array('origen', new PalabraClave('zona ')); // Origen
        $arrayPresas[] = array('cpDestino', new IdUnico(4, int)); // CP Destino
        $arrayPresas[] = array('servicio', new ListaOpciones(array('Entrega garantizada al segundo día hábil', 'Entrega garantizada al tercer día hábil'))); // Servicio
        $arrayPresas[] = array('estatus', new ListaOpciones(array('ENTREGADO'))); // Estatus
        $arrayPresas[] = array('fechaEntrega', new Fecha('dd/mm/yyyy hh:mm AMPM')); // Fecha y Hora de entrega
        $arrayPresas[] = array('tipoEnvio', new ListaOpciones(array('PAQUETE'))); // Tipo de envío
        $hunter->presas = $arrayPresas;
        $this->_arrResultadosDomHunter = $hunter->hunt();
    }

    public function testNumeroGuia() {
        $this->assertTrue('3208544064715720055515', '');
    }

    public function testCodigoRastreo() {
        $this->assertTrue('3563581975', '');
    }

    public function testServicio() {
        $this->assertTrue('Entrega garantizada al siguiente d\u00eda h\u00e1bil (lunes a viernes)', '');
    }

    public function testFechaProgramada() {
        $this->assertTrue('17\/02\/2014', '');
    }

    public function testOrigen() {
        $this->assertTrue('', '');
    }

    public function testFechaRecoleccion() {
        $this->assertTrue('07\/02\/2014 04:43 PM', '');
    }

    public function testDestino() {
        $this->assertTrue('', '');
    }

    public function testEstatusEnvio() {
        $this->assertTrue('Entregado', '');
    }

    public function testFechaEntrega() {
        $this->assertTrue('12\/02\/2014 01:01 PM', '');
    }

    public function testTipoEnvio() {
        $this->assertTrue('PAQUETE', '');
    }

    public function testRecibio() {
        $this->assertTrue('SDR:JOSE BOLA?OS', '');
    }

    public function testFirmaRecibido() {
        $this->assertTrue('http:\/\/rastreo3.estafeta.com\/RastreoWebInternet\/firmaServlet?guia=3208544064715720055515&idioma=es', '');
    }

    public function testPeso() {
        $this->assertTrue('11.8', '');
    }

    public function testPesoVolumetrico() {
        $this->assertTrue('4.7', '');
    }

}
