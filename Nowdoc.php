<?php

$text = <<< 'LABEL'
This is a nowdoc string.
It behaves like a single-quoted string.
It does not parse variables or escape sequences.
LABEL;
echo $text . PHP_EOL;
