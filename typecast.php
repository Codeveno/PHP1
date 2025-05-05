<?php
#typecasting in php is converting a variable from one datatype to another
#converting string to int
#converrting float to int
#converting bool to string



#string to int
$score = "100";
$score=(int)$score;

echo $score + 50 . PHP_EOL;


#float to int
$price = 100.77;
$price =(int)$price;

echo $price . PHP_EOL;


#boolean
$completed =true;
echo (int)$completed . PHP_EOL;
$done = false;
echo (int)$done . PHP_EOL;


#string to float
$height ="5.9";
$height = (float)$height;
echo $height +1 .PHP_EOL;


#integer to string
$age = 25;
$name = "Age:" .(string)$age;
echo $name .PHP_EOL;
