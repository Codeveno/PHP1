<?php

$dateTime = new DateTime('12/26/2025 9:15:00 AM');
$interval = new DateInterval('P3M20D');

$interval ->invert = 1;

$dateTime->add($interval);
echo $dateTime->format('m/d/y g:iA') . PHP_EOL;

$dateTime ->sub($interval);

echo $dateTime->format('m/d/y g:iA') . PHP_EOL;
?>