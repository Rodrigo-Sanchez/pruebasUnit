<?php
    require 'Ejercicio.php';
    use PHPUnit\Framework\TestCase;

    class EjercicioTest extends TestCase
    {
        /**
         * Aserción de requerido.
         *
         */
        public function testRequerido()
        {
            $valorVacio   = '             ';
            $valorNoVacio = 'Hola mundo :)';

            $this->assertFalse(requerido($valorVacio));
            $this->assertTrue(requerido($valorNoVacio));
        }

        /**
         * Aserción de enLista.
         *
         */
        function testEnLista()
        {
            $enLista = 3;
            $noEnLista = 7;
            $array = [1,2,3,4,5];

            $this->assertFalse(enLista($noEnLista, $array));
            $this->assertTrue(enLista($enLista, $array));
        }

        /**
         * Aserción de longitud.
         */
        function testLongitud()
        {
            $curp1 = '1234567890ABCDEFGH';
            $curp2 = 'ABCDEF';
            $opcion1 = ['exacto' => 18];
            $nombre1 = 'Rodrigo';
            $nombre2 = 'Luis';
            $opcion2 = ['min' => 5, 'max' => 100];

            $this->assertTrue(longitud($curp1, $opcion1));
            $this->assertFalse(longitud($curp2, $opcion1));
            $this->assertTrue(longitud($nombre1, $opcion2));
            $this->assertFalse(longitud($nombre2, $opcion2));
        }
    }

?>