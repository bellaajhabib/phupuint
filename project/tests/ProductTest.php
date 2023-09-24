<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testIDIsAnInteger(){
         $product = new Product();
         $reflector = new ReflectionClass(Product::class);
         $property  = $reflector->getProperty('product_id');

         $property->setAccessible(true);
         //$property->setValue($product,'AA');
         $value = $property->getValue($product);
         //$this->assertEquals("AA",$value);
         $this->assertIsInt($value);

    }

}