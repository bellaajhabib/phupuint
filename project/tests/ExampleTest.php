<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
    public function testMockery(): void
    {
        $mock = Mockery::mock('BarClass');
        $mock->shouldReceive('someMethod')
            ->with(100)
            ->andReturn('someValue');
        $this->assertEquals('someValue',$mock->someMethod(100));
        $this->assertSame('someValue', $mock->someMethod(100));
        $this->assertInstanceOf('BarClass',$mock);

    }
   public function testLog()
   {
       $message = 'Hello, World!';

       $loggerMock = Mockery::mock(User::class);
       $loggerMock
                  ->shouldReceive('log')
                  ->with($message)
       ->andReturn('Habib Habib');

       $this->assertEquals('Habib Habib',$loggerMock->log($message));
   }
   public function testOrderIsProcessedUsingMockery(){

        $gateway =  Mockery::mock('PaymentGeatway');
        $gateway->shouldReceive('charge')
                ->once()
            ->with(800)
            ->andReturn(true);

        $order = new Order($gateway);
        $order->amount = 800;
        $this->assertTrue($order->process());
   }
}