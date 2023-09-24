<?php
use PHPUnit\Framework\TestCase;
class testGetColour extends TestCase
{
    public function testCircle(){

        $mock = $this->getMockBuilder(Circle::class)->setConstructorArgs(['Red'])->getMock();
        $mock->expects(self::any())->method('getColour')->willReturn('Red');

        $circle = new Circle('Red');

        $this->assertIsString($mock->getColour());
        $this->assertEquals($circle->getColour(), $mock->getColour());

    }

}