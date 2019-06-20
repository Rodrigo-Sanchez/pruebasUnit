<?php
    require 'Box.php';
    use PHPUnit\Framework\TestCase;

    class BasicTest extends TestCase
    {
        //Metodo creado para fallar
        public function testToFail()
        {
            $this->assertTrue(false, 'He sido creada para fallar');
        }
        //Se toma como condicion inicial una instancia con tres elementos. Se desean
        //evaluar los resultados del metodo hasItemInBox ante diferentes entradas:
        public function testHasItemInBox()
        {
            $box = new Box(['cat', 'toy', 'torch']);
            //Se espera que para esta entrada se regrese un True como respuesta,
            //puesto que el elemento toy existe.
            $this->assertTrue($box->has('toy'));
            //Se espera que para esta entrada se regrese un False como respuesta,
            //puesto que el elemento ball no existe.
            $this->assertFalse($box->has('ball'));
        }

        //Se toma como condicion inicial una instancia con un elemento. Se desean
        //evaluar los resultados del metodo TakeOneFromTheBox ante diferentes entradas:
        public function testTakeOneFromTheBox()
        {
            $box = new Box(['torch']);
            //Se espera que sean iguales el resultado de la funcion y el elemento
            //esperado porque torch es el unico elemento en la instancia box
            $this->assertEquals('torch', $box->takeOne());

            // Se espera nulo, dado que no existe elemento en la instancia.
            $this->assertNull($box->takeOne());
        }
    }
?>
