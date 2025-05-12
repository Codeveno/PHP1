<?php
#do_while loop

$i = 2;
do {
    echo "Do Number : $i\n";
    $i++;
}
while ($i <= 5);

for ($i = 1; $i <= 5; $i++) {
    echo "For loop : $i\n";
}

#foreach loop
$colors = array("red", "green", "blue");
foreach ($colors as $color) {
    echo "Color: $color\n";
}

#with keys
$person  = ["name" => "sam", "age" => 50, "city" => "New York"];
foreach ($person as $key => $value) {
    echo "$key: $value\n";
}

#jump statements
#break

for($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        continue; 
    }
    echo "Number: $i\n";
}

#continue
for($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        continue; 
    }
    echo "Number: $i\n";
}

#return_ exit function
function great($name){
    return "Hello $name";

}
echo great("Sam") . "\n";

#exit
if(!file_exists("test.txt")){
    exit("File not found");
}



#die
function test($name){
    die("Hello $name");
    echo "This will not be executed";
}


