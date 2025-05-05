<?php
$foo = 'bar';
$$foo ='baz';

echo "$foo, " . $$foo;
?>