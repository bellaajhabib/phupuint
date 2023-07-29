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
}
