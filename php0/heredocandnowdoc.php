<?php
//heredoc
$name = "sam";
$bio = <<<INFO

hi, may name is $name.
I love programming.
INFO;
echo $bio . PHP_EOL;
