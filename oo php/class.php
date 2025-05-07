<?php
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
    }

$myCar = new car("Toyota");
echo $myCar->drive();


$mycar1 = new car("Honda");
echo $mycar1->drive() .PHP_EOL;

