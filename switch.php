<?php
$day = readline("Enter the day: ");
switch (strtolower($day)) { 
    case 'monday':
        echo "Start of the week";
        break;
    case 'friday':
        echo "End week";
        break;
    case 'wednesday':
        echo "Today is Wednesday";
        break;
    default:
        echo "Midweek";
}
