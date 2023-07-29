<?php

class ItemChild extends Item
{
    public function getID(): int
    {
        return parent::getID();
    }

    /**
     * @throws ReflectionException
     */
    public function getToken()
    {
        $item = new Item();
        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
        $method->invoke($item);
        return $method;
    }
}