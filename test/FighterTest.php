<?php

require 'src/Fighter.php';

use PHPUnit\Framework\TestCase;

class FighterTest extends TestCase
{
    public function testDamage()
    {
        $fighter = new Fighter('hercules', 10, 5);
        $attacked = new Fighter('lion', 10, 5);
        $this->assertEquals($fighter->getStrength(), 10);
        $this->assertEquals($attacked->getDefense(), 5);

        $this->assertLessThanOrEqual(10, $fighter->getDamage());
        $this->assertGreaterThanOrEqual(1, $fighter->getDamage());
    }
    
    public function testFight()
    {
        $fighter = new Fighter('hercules', '', 10, 5);
        $attacked = new Fighter('lion', '', 10, 5);
        $fighter->fight($attacked);

        $this->assertLessThanOrEqual(100, $attacked->getLife());
        $this->assertGreaterThanOrEqual(90, $attacked->getLife());
    }    

    public function testFightWithMock()
    {
        $attacked = new Fighter('lion', '', 10, 5);

        $fighterStub = $this->getMockBuilder(Fighter::class)
        ->setMethods(['getDamage'])
        ->setConstructorArgs(['Hercules', '', 10, 10])
        ->getMock();

        $fighterStub->method('getDamage')->willReturn(8);
        $fighterStub->fight($attacked);
        $this->assertSame(8, $fighterStub->getDamage());
        $this->assertEquals(97, $attacked->getLife());

        $fighterStub = $this->getMockBuilder(Fighter::class)
        ->setMethods(['getDamage'])
        ->setConstructorArgs(['Hercules', '', 10, 10])
        ->getMock();
        $fighterStub->method('getDamage')->willReturn(12);
        $fighterStub->fight($attacked);
        $this->assertSame(12, $fighterStub->getDamage());
        $this->assertEquals(90, $attacked->getLife());
    }
    
    public function testDeadWithMock()
    {
        $attacked = new Fighter('lion', '', 10, 5);

        $fighterStub = $this->getMockBuilder(Fighter::class)
        ->setMethods(['getDamage'])
        ->setConstructorArgs(['Hercules', '', 10, 10])
        ->getMock();
        $fighterStub->method('getDamage')->willReturn(120);
        $fighterStub->fight($attacked);
        $this->assertSame(120, $fighterStub->getDamage());
        $this->assertEquals(0, $attacked->getLife());
    }
}