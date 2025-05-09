<?php

// Explanation of WeakMap:
// A WeakMap is a collection that holds references to objects, but unlike an array, 
// it does not prevent those objects from being garbage collected. 
// This is particularly useful when you want to store data associated with objects but don't want to affect the lifecycle of the object.

echo "<h2>WeakMap Example in PHP</h2>";

// Create a new WeakMap instance
$weakMap = new WeakMap();

// Create a sample object
$obj1 = new stdClass();
$obj1->name = "Object 1";

// Add an entry to the WeakMap with $obj1 as the key and a string value
$weakMap[$obj1] = "Data for Object 1";

// Display the WeakMap entry for obj1
echo "Before Unset: ";
echo "Data for obj1: " . $weakMap[$obj1] . "<br>";  // Should print: Data for Object 1

// Unset the reference to $obj1
unset($obj1);

// Attempt to access the WeakMap after $obj1 is unset
echo "After Unset: ";
try {
    // Since $obj1 is no longer in memory, trying to access it in the WeakMap should raise a notice or return null
    echo "Data for obj1: " . $weakMap[$obj1] . "<br>";  // Will result in an error as $obj1 is no longer a valid object
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<hr>";

// Example with multiple objects and observing garbage collection
echo "<h3>Multiple Objects Example</h3>";

$weakMap = new WeakMap();

// Create two new objects
$obj2 = new stdClass();
$obj2->name = "Object 2";

$obj3 = new stdClass();
$obj3->name = "Object 3";

// Add entries to the WeakMap with these objects
$weakMap[$obj2] = "Data for Object 2";
$weakMap[$obj3] = "Data for Object 3";

// Display the contents of the WeakMap
echo "Before Unset: <br>";
echo "Data for obj2: " . $weakMap[$obj2] . "<br>";  // Should print: Data for Object 2
echo "Data for obj3: " . $weakMap[$obj3] . "<br>";  // Should print: Data for Object 3

// Now, unset both objects
unset($obj2);
unset($obj3);

// Try to access the data for obj2 and obj3 after they are unset
echo "After Unset: <br>";

try {
    // obj2 should be garbage collected after it is unset
    echo "Data for obj2: " . (isset($weakMap[$obj2]) ? $weakMap[$obj2] : "No Data") . "<br>"; // No data should be returned
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

try {
    // obj3 should also be garbage collected after it is unset
    echo "Data for obj3: " . (isset($weakMap[$obj3]) ? $weakMap[$obj3] : "No Data") . "<br>"; // No data should be returned
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<hr>";

// More advanced example: Using WeakMap for caching object data
echo "<h3>Using WeakMap for Object Caching</h3>";

// A cache function using WeakMap
function cacheData($obj) {
    static $cache = null;
    
    // If cache is not initialized, initialize it
    if ($cache === null) {
        $cache = new WeakMap();
    }
    
    // Check if the data for this object is already cached
    if (isset($cache[$obj])) {
        return $cache[$obj];  // Return the cached data
    }

    // If not cached, compute the data (simulate by simply returning a string)
    $data = "Computed data for " . $obj->name;
    
    // Cache the computed data for the object
    $cache[$obj] = $data;
    
    return $data;  // Return the computed data
}

// Create an object
$obj4 = new stdClass();
$obj4->name = "Object 4";

// Cache the data for obj4
echo "Cached data for obj4: " . cacheData($obj4) . "<br>";  // Should compute and cache the data

// Access the cached data for obj4 again
echo "Cached data for obj4 again: " . cacheData($obj4) . "<br>";  // Should return cached data

// Unset the object
unset($obj4);

// Try to access the cached data for obj4 after it is unset
echo "After Unset: ";
echo "Cached data for obj4: " . (isset($cache[$obj4]) ? $cache[$obj4] : "No cached data") . "<br>"; // Should not return any cached data

?>

