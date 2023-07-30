<?php

/**
 * Item
 *
 * An example item class
 */
class Item
{
    private $productId;

    public function __construct()
    {
        $this->productId = rand(1,20);
    }

    /**
     * Get the description
     *
     * @return integer A random integer
     */
    public function getDescription()
    {
        return $this->getID() . $this->getToken();
    }

    /**
     * Get a random ID
     *
     * @return integer The ID
     */
    protected function getID()
    {
        return rand();
    }

    /**
     * Get a random token
     *
     * @return string The token
     */
    private function getToken(): string
    {
        return uniqid();
    }

    /**
     * @param string $prefix
     * @param string $go
     * @return string
     */
    private function getPrefixedToken(string $prefix, string $go): string
    {
        return uniqid($prefix).$go;
    }

    protected function getAverageSum(array $data)
    {
      return array_sum($data);
    }
}
