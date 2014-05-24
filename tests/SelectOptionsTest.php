<?php

require_once '../vendor/autoload.php';
require_once '../src/Ivansabik/DomHunter/DomHunter.php';

use Ivansabik\DomHunter\SelectOptions;
use Sunra\PhpSimple\HtmlDomParser;

# Prueba la clase Tabla

class SelectOptionsTest extends PHPUnit_Framework_TestCase {

    private $_dom;
    private static $_arrTablaPrueba = array(
    );

    protected function setUp() {
        
    }

    public function testNavegacion() {
        $this->markTestIncomplete('testNavegacion() no esta definido');
    }

    public function testOcurrenciaNumero() {
        $this->markTestIncomplete('testOcurrenciaNumero() no esta definido');
    }

    public function testOcurrenciaUltimo() {
        $this->markTestIncomplete('testOcurrenciaUltimo() no esta definido');
    }

    public function testIdNodo() {
        $this->markTestIncomplete('testIdNodo() no esta definido');
    }

    public function testIdNodoInexistente() {
        $this->markTestIncomplete('testIdNodoInexistente() no esta definido');
    }

    public function testNumOcurrenciaInvalido() {
        $this->markTestIncomplete('testNumOcurrenciaInvalido() no esta definido');
    }

    public function testSkipTitulos() {
        $this->markTestIncomplete('testSkipTitulos() no esta definido');
    }

}