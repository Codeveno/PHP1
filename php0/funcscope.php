<?php
$name = "sam";
function ShowName()
{
    global $name;
    echo "Hello $name!";
}
ShowName();
//you cant have funcs with same name

