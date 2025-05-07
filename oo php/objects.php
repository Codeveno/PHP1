<?php
$mycar = new car("Toyota");
echo $mycar -> drive();

$mycar ->brand  = "honda";
echo $mycar -> drive() .PHP_EOL;

class car{
    public $brand;
    private $speed = 50;
    public function  __construct($brand)
    {
        $this->brand = $brand;
    }


    public function drive()
    {
        return "The {$this->brand} is driving at {$this->speed} mph.";
    }

};



