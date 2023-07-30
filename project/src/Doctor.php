<?php

class Doctor extends AbstractPerson
{
    protected function getTitle()
    {
        return 'Dr.';
    }
      public function checkExistLists(array $data)
    {
        return in_array($this->getName(),$data);
    }
}