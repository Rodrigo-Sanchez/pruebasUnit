<?php

use PHPUnit\Framework\TestCase;
require 'Global.php';

class DependencyFailureTest extends TestCase
{
    public function testGenerateSessionToken()
    {
        generateSessionToken();
        $this->assertNotEmpty($_SESSION['csrf_token']);
        $_POST['csrf_token'] = $_SESSION['csrf_token'];
    }

    public function testCsrf_token_is_valid()
    {
        $this->assertFalse(csrf_token_is_valid());
    }

    public function testValorStatic()
    {
        $cuenta = new Cuenta();

        $this->assertEquals(0, $cuenta->valorStatic());
        $cuenta->aumentaStatic();
        $this->assertGreaterThan(0, $cuenta->valorStatic());
    }

    public function testAumentaStatic()
    {
        $cuenta = new Cuenta();

        $this->assertEquals(1, $cuenta->valorStatic());
        $cuenta->aumentaStatic();
        $this->assertGreaterThan(1, $cuenta->valorStatic());
    }
}
