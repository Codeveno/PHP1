<?php
$programminglang =['php','java','python','c#','javascript'];
echo $programminglang[4] . PHP_EOL;


$name = "sam";
echo  $name[1] . PHP_EOL;

var_dump((isset($programminglang[7])));//this shows is value at that specific index is set or defined in array
$programminglang[2] = "go";
echo $programminglang[2] . PHP_EOL;

echo array_pop($programminglang) . PHP_EOL; 
 print_r($programminglang);
 array_shift($programminglang);
    print_r($programminglang);
    