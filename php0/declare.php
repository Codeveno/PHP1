<?php

#declare tick
function ontick()
{
    echo "Tick\n";
}

register_shutdown_function('ontick');
declare(ticks=4);
$counter = 0;
$lenth = 10;

while ($counter < $lenth) {
    $counter++;
    echo "Tick\n";
    sleep(1);
}
