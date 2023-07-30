<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {
        $doctor = new Doctor('Green');
        
        $this->assertEquals('Dr. Green', $doctor->getNameAndTitle());
          $this->assertEquals('Green', $doctor->getName());
    }
        public function testCheckExistLists()
    {
        $doctor = new Doctor('White');
        $this->assertTrue($doctor->checkExistLists(['Green','Yellow','White']));
        $this->assertNotTrue($doctor->checkExistLists(['Bleu','Brown','Pink']));
    }
    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
                     ->setConstructorArgs(['Green'])        
                     ->getMockForAbstractClass();  
                     
        $mock->method('getTitle')
             ->willReturn('Dr.');
            
        $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
    }
    public function  testNameOfTitle(){

        $mock = $this -> getMockBuilder(AbstractPerson::class)
                      -> setConstructorArgs(['Yellow'])
                      -> getMock();
        $mock->method('getName')
             ->willReturn('FG');
       $mock->method('getRandomName')
             ->willReturn(rand(1,20).'_'.$mock->getName());
        $this->assertStringEndsWith('FG',$mock->getName());

    }
}