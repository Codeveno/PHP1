<?php

class myclass
{
    public $myproperty = 'house';
    
    public function __construct($myproperty)
    {
        $this->myproperty = $myproperty;
    }

    public function __toString()
    {
        return $this->myproperty;
    }
}

echo $myproperty = new myclass('car');
