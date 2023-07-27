<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{


    public function testReturnsFullName()
    {
        $user = new User();

        $user->first_name = "Teresa";
        $user->surname = "Green";

        $this->assertEquals('Teresa Green', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());

    }
    /**
     * @test
     */
    public function user_has_first_name(){

         $user = new User();
         $user->first_name ="Tersea";
         $this->assertEquals('Tersea', $user->first_name);

    }

    public function testNotificationIsSent()
    {
        $user = new User;
        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer ->expects($this->atLeastOnce())
                     ->method('sendMessage')
                     ->with($this->equalTo('dave@exeample.com'), $this->equalTo('Hello'))
                     ->willReturn(true);

       $user->setMailer($mock_mailer);
       $user->email = 'dave@exeample.com';

       $this->assertTrue( $user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail(){

               $user = new User;

        $mock_mailer = $this->getMockBuilder(Mailer::class)
                            ->setMethods(null)
                            ->getMock();

        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);


    }

    public function testFerWell(){

                 $user = new User;
        $mock = $this->getMockBuilder(Mailer::class)
            ->setMethods(['getFarewell','getGreeting'])
             ->getMock();
        $mock->method('getFarewell')->willReturn('Bye!');
        $mock->method('getGreeting')->willReturn('Hello!');

         $this->assertEquals( $mock->getFarewell(), $user->getFarewell());
          $this->assertEquals( $mock->getGreeting(), $user->getGreeting());
    }
    public function testIncrement()
    {
        // Create a mock object for the Counter class
        $mockCounter = $this->getMockBuilder(User::class)->setMethods(['increment','getCount'])
                            ->getMock();

        // Set an expectation that the increment() method should be called exactly three times
        $mockCounter->expects($this->exactly(2))
                    ->method('increment');

        // Call the method you want to test on the mock object, which should invoke 'increment()' three times
         $mockCounter->increment();
                  $mockCounter->increment();   var_dump($mockCounter->getCount());die();
        // Perform assertions to verify the behavior of the code being tested
        $this->assertEquals(2, $mockCounter->getCount());
    }
}