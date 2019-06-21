<?php
require 'DoblePrueba.php';
use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
    public function testSumar()
    {
        // CreateMoch crea un doble de la clase DoblePrueba.
        $stub = $this->createMock(DoblePrueba::class);

        // Manda a llamar la imitación del método sumar.
        // El valor estático que regresa la función siempre es 5.
        $stub->method('sumar')
             ->willReturn(5);

        // Por lo cual la primera aserción es cierta mientras
        // que la segunda es falsa.
        $this->assertSame(5, $stub->sumar(3,3));
        $this->assertSame(6, $stub->sumar(3,3));
    }

    public function testMapeo()
    {
        $stub = $this->createMock(DoblePrueba::class);

        $map = [
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        ];

        $stub->method('mapeo')
             ->will($this->returnValueMap($map));

        $this->assertSame('d', $stub->mapeo('a', 'b', 'c'));
        $this->assertSame('h', $stub->mapeo('e', 'f', 'g'));
    }
}
?>
