
<!-- Write a PHP function that will take a string as an argument and return the string reversed, but with the order of the words kept the same.

php
Copy code
function reverseStringKeepWordOrder($string) {
    // Your code here
}
Answer:

Here's the PHP function:

<?php
function reverseStringKeepWordOrder($string) {
    $words = explode(" ", $string);
    for ($i = 0; $i < count($words); $i++) {
        $words[$i] = strrev($words[$i]);
    }
    return implode(" ", $words);
}
<!-- This function splits the input string into an array of words, then iterates through that array and reverses each word. Finally, it rejoins the array of words back into a single string with spaces between the words and returns the result. -->
