<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require dirname(__DIR__) . '/src/Utils.php';

final class UtilsTest extends TestCase
{
    public function testGetNameWithValidValue()
    {
        $utils = new Utils();
        $this->assertEquals("Axel", $utils->get_name(1981, 6, 16));
    }

    public function testGetNameWithInvalidValue()
    {
        $utils = new Utils();
        $this->assertNull($utils->get_name(1981, 6, -60));
    }

    public function testGetNameWithInvalidReturn()
    {
        $utils = new Utils();
        $this->assertNotEquals("Berit", $utils->get_name(1981, 6, 16));
    }

    public function testGetInsultWithValidValue()
    {
        $utils = new Utils();
        $insult = $utils->get_insult("Axel");
        //$this->assertInternalType('string', $insult->message);
        $this->assertInternalType('array', $insult);
        $this->assertEquals('Axel', $insult["signed"]);
        $this->assertNotNull($insult["signed"]);
    }

    public function testPickInsult()
    {
        $utils = new Utils();
        $this->assertInternalType('string', $utils->pick_insult());
    }
}
