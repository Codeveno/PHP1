<?php

// Basic Generator: Yield numbers from $start to $end
// This function creates a generator that yields numbers from $start to $end.
function numberGenerator($start, $end) {
    // Loop from $start to $end, including both.
    for ($i = $start; $i <= $end; $i++) {
        // 'yield' pauses the function execution, returning the current value ($i).
        // The function's state is saved, and the code execution can be resumed from where it left off when the next value is requested.
        yield $i;  
    }
}

// Using the basic generator to get values
echo "Basic Generator:<br>";
// Instantiate the generator by calling the function with 1 and 5 as the arguments.
$numbers = numberGenerator(1, 5);
// Iterating over the generator will fetch values one by one
foreach ($numbers as $number) {
    echo $number . "<br>";  // Outputs the yielded number
}
echo "<hr>";  // Separates output visually

// Generator with Keys and Values: Yield key-value pairs
// This generator returns key-value pairs, where key is the number itself ($i) and value is its double ($i * 2).
function numberGeneratorWithKeys($start, $end) {
    // Loop through numbers from $start to $end
    for ($i = $start; $i <= $end; $i++) {
        // Yield key-value pair: the key is the number, and the value is twice that number.
        yield $i => $i * 2;  
    }
}

// Using the generator with keys and values
echo "Generator with Keys and Values:<br>";
// Instantiate the generator with the range 1 to 5
$numbersWithKeys = numberGeneratorWithKeys(1, 5);
// Iterate through the generated key-value pairs
foreach ($numbersWithKeys as $key => $value) {
    // Output the key and value pair
    echo "Key: $key, Value: $value<br>";
}
echo "<hr>";  // Another separator

// Generator with Return: Using return after the generator completes
// This generator also returns a final message after it yields the values.
function numberGeneratorWithReturn($start, $end) {
    // Loop through the numbers from $start to $end
    for ($i = $start; $i <= $end; $i++) {
        // Yield each number one by one
        yield $i;  
    }
    // After the loop ends, return a message that marks the completion of the generation process
    return "Finished generating numbers";  
}

// Using the generator with return
echo "Generator with Return:<br>";
// Instantiate the generator with the range 1 to 3
$numbersWithReturn = numberGeneratorWithReturn(1, 3);
// Iterating over the yielded values
foreach ($numbersWithReturn as $number) {
    // Output the yielded numbers
    echo $number . "<br>";
}
// After iterating, you can fetch the return value using iterator_to_array, as generators return values only after iteration ends.
$generatorReturn = iterator_to_array($numbersWithReturn); 
// Display the return message from the generator, which is accessible after the iteration completes.
echo $generatorReturn[0];  // Access and print the return value
echo "<hr>";  // Separator

// Infinite Generator: Generate an infinite Fibonacci sequence
// This generator yields Fibonacci numbers indefinitely.
function fibonacci() {
    $a = 0;  // First Fibonacci number
    $b = 1;  // Second Fibonacci number
    
    // 'while (true)' creates an infinite loop, which can only be stopped by an external condition or manual interruption.
    while (true) {
        // Yield the current Fibonacci number ($a)
        yield $a;  
        // Calculate the next Fibonacci number by updating $a and $b
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
}

// Using the infinite Fibonacci generator
echo "Infinite Fibonacci Sequence:<br>";
// Instantiate the generator
$fib = fibonacci();
// Display the first 10 Fibonacci numbers
for ($i = 0; $i < 10; $i++) {  // Limit output to the first 10 numbers
    // Fetch the current Fibonacci number
    echo $fib->current() . "<br>";
    // Move to the next Fibonacci number in the sequence
    $fib->next();  
}
echo "<hr>";  // Separator

// Generator for Large File Reading: Read large file line by line
// This generator is ideal for reading large files where loading the entire file into memory is impractical.
function readLargeFile($filename) {
    // Open the file in read mode
    $file = fopen($filename, 'r');
    
    // Check if the file is successfully opened
    if (!$file) {
        // If the file cannot be opened, throw an exception with an error message.
        throw new Exception("File not found: " . $filename);
    }
    
    // Loop through each line of the file
    while ($line = fgets($file)) {
        // Yield each line one by one as the generator's output
        yield $line;  
    }
    
    // Close the file after the iteration is done
    fclose($file);
}

// Using the generator to read a file (make sure to create a 'large_file.txt' for testing)
echo "Reading Large File (each line):<br>";
try {
    // Instantiate the generator with the file path (adjust path as needed)
    $lines = readLargeFile('large_file.txt');
    // Iterate over the file lines
    foreach ($lines as $line) {
        // Output each line
        echo $line . "<br>";
    }
} catch (Exception $e) {
    // Catch and display errors if the file is not found or any other issue occurs
    echo $e->getMessage();
}

?>
