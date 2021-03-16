<?php

require 'src/Fighter.php';

use PHPUnit\Framework\TestCase;

class FighterTest extends TestCase
{
    private Fighter $hercules;
    private Fighter $mockHercules;
    private Fighter $lion;

    public function setUp(): void
    {
        $this->hercules = new Fighter('hercules', 10, 5);
        $this->lion = new Fighter('lion', 12, 5);
        $this->mockHercules = $this->getMockBuilder(Fighter::class)
            ->setMethods(['getDamage'])
            ->setConstructorArgs(['Hercules', 10, 10])
            ->getMock();

    }
    
    public function testDamage()
    {
        $this->assertEquals($this->hercules->getStrength(), 10);
        $this->assertEquals($this->lion->getDefense(), 5);

        $this->assertLessThanOrEqual(10, $this->hercules->getDamage());
        $this->assertGreaterThanOrEqual(1, $this->hercules->getDamage());

        $this->assertLessThanOrEqual(12, $this->lion->getDamage());
        $this->assertGreaterThanOrEqual(1, $this->lion->getDamage());
    }
    
    public function testAttack()
    {
        $this->hercules->fight($this->lion);

        $this->assertLessThanOrEqual(100, $this->lion->getLife());
        $this->assertGreaterThanOrEqual(90, $this->lion->getLife());

        $this->lion->fight($this->hercules);
        $this->assertLessThanOrEqual(100, $this->lion->getLife());
        $this->assertGreaterThanOrEqual(88, $this->lion->getLife());
    }    

    public function testMickFighterAttack()
    {
        $fighterStub = $this->getMockBuilder(Fighter::class)
        ->setMethods(['getDamage'])
        ->setConstructorArgs(['Hercules', 10, 10])
        ->getMock();

        $fighterStub->method('getDamage')->willReturn(8);
        $fighterStub->fight($this->lion);
        $this->assertSame(8, $fighterStub->getDamage());
        $this->assertEquals(97, $this->lion->getLife());
    }

    public function testAttackLesserThanDefense() {
        $this->mockHercules->method('getDamage')->willReturn(3);
        $this->mockHercules->fight($this->lion);
        $this->assertSame(3, $this->mockHercules->getDamage());
        $this->assertEquals(100, $this->lion->getLife());
    }
    
    public function testDeadWithMock()
    {
        $this->mockHercules->method('getDamage')->willReturn(120);
        $this->mockHercules->fight($this->lion);
        $this->assertSame(120, $this->mockHercules->getDamage());
        $this->assertEquals(0, $this->lion->getLife());
    }
}