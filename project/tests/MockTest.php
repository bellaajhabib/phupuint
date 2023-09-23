<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')
            ->willReturn(true);
        $result = $mock->sendMessage('habib@habib.com', 'HELLO');

        $this->assertTrue($result);
//        $mock = $this->createMock(Mailer::class);
//        $mock->method('sendMessage')
//             ->willReturn(true);
//
//        $result = $mock->sendMessage('habib@habib.com','HELLO');
//        $this->assertTrue($result);


    }

    public function testAdd()
    {
        $mock = $this->getMockBuilder(Mailer::class)->getMock();
        $add = $mock->method('add');
        $map = [
            [2, 3, 5],
            [10, 5, 15]
        ];
        $add->will($this->returnValueMap([
            $map
        ]));
        $email = new Mailer();
        $result1 = $email->add(2, 3);
        $result2 = $email->add(10, 5);
        var_dump($result2);
        $this->assertEquals(5, $result1);
        $this->assertEquals(15, $result2);

    }
}