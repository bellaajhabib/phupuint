<?php
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
public function testAdd()
    {
        // Create a mock object for the MathService class
        $mathServiceMock = $this->getMockBuilder(MathService::class)
            ->getMock();

        // Define the method call-return value map for the mock
        $mathServiceMock->method('add')
            ->will($this->returnValueMap([
                [2, 3, 5],
                [10, 5, 15],
            ]));

        $mathServiceMock->method('sub')
            ->will($this->returnValueMap([
                [10, 8, 2],
                [10, 5, 5],
            ]));

        $calculator = new Calculator($mathServiceMock);

        // Test the add method
        $result1 = $calculator->add(2, 3);
        $this->assertEquals(5, $result1);

        $result2 = $calculator->add(10, 5); // Should return 15 based on the map
        $this->assertEquals(15, $result2);

        $result3 = $calculator->sub(10, 8);
        $this->assertEquals(2, $result3);
         $result4 = $calculator->sub(10, 5);
        $this->assertEquals(5, $result4);
    }
}