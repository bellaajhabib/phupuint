<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
 public function testReturnsFullName(){
     $user = new User();
     $user->first_name = "Teresa";
     $user->surname = "Green";
     $this->assertEquals('Teresa Green', $user->getFullName());
 }

 public function testFullNameIsEmptyByDefault(){
     $user = new User;
     $this->assetEquals('',$user->getFullName());
 }
 public function testNotificationIsSent(){
     $user = new User();
 }

     public function testNotifyReturnsTrue()
    {
        $gateway =  Mockery::mock('Mailer');
        $gateway->shouldReceive('send')
             ->with('88')
                 ->andReturn(true);
         $user = new User('dave@example.com');
        $user->setMailer($gateway);

        $this->assertTrue($user->notify('Hello!'));
    }
      public function testNotifyStaticReturnsTrue()
    {
               $user = new User('dave@example.com');
               $mock  = Mockery::mock('alias:Mailer');
               $mock->shouldReceive('send')->once()->with($user->email, 'Hemm');
               $this->assertTrue($user->notifyStaticCall('Hemm'));

    }
}