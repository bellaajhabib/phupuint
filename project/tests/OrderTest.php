<?php
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
  public function testOrder(){

      $mock_payment = $this ->getMockBuilder("PaymentGateway")
                             ->setMethods(['charge','check'])
                             ->getMock();

          $mock_order = $this ->getMockBuilder("Order")->disableOriginalConstructor()
                             ->setMethods(['getCountProcess','countProcess'])
                             ->getMock();
          $mock_order->expects($this->any())->method('getCountProcess')->willReturn(2);


      $mock_payment->expects($this->any())->method('charge')->with($this->equalTo(400))->willReturn(true);
      $mock_payment->expects($this->any())->method('check')->with($this->equalTo('127.0.0.1'))->willReturn('valid_ip');
      $order = new Order($mock_payment);
      $order->amount = 400;
      $order->ip = '127.0.0.1';
       $order->countProcess();
        $order->countProcess();
      $this->assertTrue($order->process());
      $this->assertEquals('valid_ip',$order->checkProcess());
        $this->assertSame($order->getCountProcess(),$mock_order->getCountProcess());
  }

  public function testOrderIsProcessdUsingMockery(){
         $gateway =  $this->getMockBuilder('PaymentGateway')
                           ->setMethods(["charge","check"])
                            ->getMock();
         $gateway->expects($this->once())->method('charge')
               ->with($this->equalTo(200))->willReturn(true);
       $gateway->expects($this->any())->method('check')
               ->with($this->equalTo('127.0.0.1'))
               ->willReturn('A valid IP address');
         $order = new Order($gateway);
         $order->amount = 200;
         $order->ip = '127.0.0.1';
         $order->countProcess();
         $order->countProcess();
          $this->assertEquals('A valid IP address', $order->checkProcess());
          $this->assertEquals($order->getCountProcess(), 2);
         $this->assertTrue($order->process());

//         $gateway->shouldReceive('charge')
//                 ->once()
//                 ->with(200)
//                 ->andReturn(true);
//
//         $order = new Order($gateway);
//         $order->amount = 200;
//         $this->assertTrue($order->process());
  }
}