<?php
    use PHPUnit\Framework\TestCase;

    class StackTest extends TestCase
    {
        protected $stack;
        protected static $stackBackup, $file;

        public static function setUpBeforeClass(): void{
            self::$stackBackup = [];
            self::$file = fopen("EjemploAmbiente/prueba.txt", "r");
        }

        protected function setUp(): void
        {
            $this->stack = [1,2];
        }

        public function testEmpty()
        {
            $this->assertFalse(empty($this->stack));
            array_push(self::$stackBackup, 5);
            $this->assertEquals(self::$stackBackup[0],5);
        }

        public function testPush()
        {
            $this->assertContains(5,self::$stackBackup);
            $this->assertTrue(empty($this->stackBackup));
            array_push($this->stack, 'foo');
            $this->assertSame(1, $this->stack[0]);
            $this->assertFalse(empty($this->stack), "Fallo");
        }

        public function testPop()
        {
            array_push($this->stack, 'foo');
            $this->assertSame('foo', array_pop($this->stack));
            $this->assertEquals(count($this->stack),2);
        }

        public function testReadFile($value='')
        {
            $this->assertTrue(true);
            if ($line = fgets(self::$file)) {
                $this->assertStringStartsWith('Hola', $line);
            }
        }

        public static function tearDownAfterClass(): void
        {
            fclose(self::$file);
        }
    }
?>
