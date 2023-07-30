<?php

class ItemChild extends Item
{
    public function getID(): int
    {
        return parent::getID();
    }
    public function getSumArray(array $data)
    {
        return parent::getAverageSum($data);
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