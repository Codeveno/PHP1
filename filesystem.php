<?php
$dir = scandir(__DIR__);

var_dump(is_dir($dir[7]));
