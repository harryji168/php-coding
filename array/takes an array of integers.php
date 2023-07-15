<!-- Write a PHP function that takes an array of integers as an input and returns an array with the squared values of the given integers. The function should handle any number of integers.
php
Copy code
function squareArray($array) {
  // Your code here
} -->
<?php

// Answer:
// Here's how you can achieve that:
// php
// Copy code
function squareArray($array) {
  $result = array();

  foreach($array as $value) {
    array_push($result, $value ** 2);
  }

  return $result;
}

// This function squares each value in the input array and stores the squared values in a new array, which is then returned. It can handle any number of integers in the input array.
