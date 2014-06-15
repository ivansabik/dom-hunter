<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\SelectOptions;
use Sunra\PhpSimple\HtmlDomParser;

class SelectOptionsTest extends PHPUnit_Framework_TestCase {

    private $_dom;
    private static $_arrTablaPrueba = array(
    );

    protected function setUp() {
        
    }

    public function testIdNodo() {
        $select = new SelectOptions();
        $select->nombre('instituciones');
        $select->id_nodo('comboDependencia');
        $select->skip(1);
        # 'clave_institucion', 'nombre_institucion'
    }

    public function testOcurrenciaNumero() {
        $this->markTestIncomplete('testOcurrenciaNumero() no esta definido');
    }

    public function testOcurrenciaUltimo() {
        $this->markTestIncomplete('testOcurrenciaUltimo() no esta definido');
    }

    public function testIdNodoInexistente() {
        $this->markTestIncomplete('testIdNodoInexistente() no esta definido');
    }

    public function testNumOcurrenciaInvalido() {
        $this->markTestIncomplete('testNumOcurrenciaInvalido() no esta definido');
    }

}