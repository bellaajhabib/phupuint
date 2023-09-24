<?php

class ItemChild extends Item
{

    public function getIDs(): int
    {
        return parent::getID();
    }
}