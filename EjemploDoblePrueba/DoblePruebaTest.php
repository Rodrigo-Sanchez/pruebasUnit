<?php
require 'DoblePrueba.php';
use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
    public function testSumar()
    {
        $stub = $this->createMock(DoblePrueba::class);

        $stub->method('sumar')
             ->willReturn(5);

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
