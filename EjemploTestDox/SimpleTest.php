<?php

use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(FALSE);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
        $var = '1';
        $this->assertEquals(1, $var);
    }

    /**
     * La asercion assertEmpty recibe como parametro una variable y regresa true si esta vacia
     *
     */
    public function testEmpty()
    {
        $hola = "";
        $this->assertEmpty($hola);
    }

    public function testFalse()
    {
        $this->assertFalse(2==2, "Es verdadero que 2 es igual a 2");
    }
}
