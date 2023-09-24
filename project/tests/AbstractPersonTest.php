<?php

use PHPUnit\Framework\TestCase;
class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned(){
        $doctor = new Doctor("Green");
        $this->assertEquals('Dr. Green',$doctor->getNameAndTitle());
    }

        public function testNameAndTitleIsReturnedIng(){
        $doctor = new Ing("Habib");
        $this->assertEquals('Ing. Habib',$doctor->getNameAndTitle());
    }
    public function testGetColourUsingMockBuilder()
{
    $username = "kikorangi";
    $mock = $this
        ->getMockBuilder(AbstractPerson::class)
        ->setConstructorArgs([$username])
        ->getMockForAbstractClass();
      $mock->method('getTitle')->willReturn("Dr.");
      $actualColour = $mock->getNameAndTitle();
      $this->assertEquals('Dr. kikorangi',$actualColour);
}
}