<!-- key: value".  Write a PHP function that takes an associative array and prints the keys and values in the format "key: value" -->
<?php
function printAssociativeArray($array) {
  foreach($array as $key => $value) {
    echo $key . ": " . $value . "\n";
} } 
// In this function, we use a foreach loop to iterate over each key-value pair in the associative array. For each pair, we print the key and value in the desired format. The "\n" at the end of the echo statement adds a new line after each key-value pair, for readability.


// that calculates the factorial of a number. A factorial is the product of an integer and all the integers below it, down to 1.
