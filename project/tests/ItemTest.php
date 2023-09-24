<?php
use \PHPUnit\Framework\TestCase;
class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item();

        $this->assertNotEmpty($item->getDescription());
        $this->assertIsString($item->getDescription());
    }

    /**
     * @throws ReflectionException
     */
    public function testIDisAnInteger(){

        $reflectionMethod = new ReflectionMethod(Item::class,'getID');
        $reflectionMethod->setAccessible(true);
        $item = new Item();
        $getIDCall = $reflectionMethod->invoke($item);
        $this->assertIsInt($getIDCall);
    }

        public function testIDisAnIntegerItemChild(){
        $itemChild = new ItemChild();
        $this->assertIsInt($itemChild->getIDs());
    }
            public function testToken(){
        $reflectionMethod = new ReflectionMethod(Item::class,'getToken');
        $reflectionMethod->setAccessible(true);
        $item = new Item();
        $tokenCall = $reflectionMethod->invoke($item);

        $this->assertIsString($tokenCall);
    }
}