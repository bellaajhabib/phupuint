<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;
        
        $this->assertNotEmpty($item->getDescription());                    
    }
    
    public function testIDisAnInteger()
    {
        $item = new ItemChild;

        $this->assertIsInt($item->getID());
        $this->assertGreaterThanOrEqual(0,$item->getID());
    }

    /**
     * @throws ReflectionException
     */
    public function testGetToken()
    {
        $item = new Item;
        $reflection = new ReflectionClass(Item::class);
        $method = $reflection->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($item);

        // $this->assertStringContainsString($result);
        //$this->assertIsInt($item->getToken());
        $this->assertIsString($result);
         $this->assertGreaterThanOrEqual(0,(int)$result);
    }
        public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);
        $result = $method->invokeArgs($item, ['example','go']);
        $this->assertStringStartsWith('example', $result);
        $this->assertStringEndsWith('go', $result);
    }
      public function testSumArray()
      {
          $item = new ItemChild;
          $result = $item->getSumArray([20,40]);
          $this->assertEquals(60, $result);
      }

            public function testIdAndInteger()
      {
         $item = new Item;
         $reflection = new ReflectionClass(Item::class);
         $property = $reflection->getProperty('productId');
         $property->setAccessible(true);
         $value = $property->getValue($item);
         $this->assertIsInt($value);
      }
}
