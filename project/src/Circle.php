<?php

class Circle
{
    protected string $colour  ;
    public function __construct(  string $colour)
    {
        $this->colour = $colour;
    }

    public function getColour(): string
    {
        return $this->colour;
    }
}