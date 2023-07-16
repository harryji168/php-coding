<!-- Have the function LetterCapitalize(str) take the str parameter being passed and capitalize the first letter of each word. Words will be separated by only one space.
Examples
Input: "hello world"
Output: Hello World
Input: "i ran there"
Output: I Ran There
  -->

<?php

/**
 * @param mixed $str
 *
 * @return [type]
 */
function LetterCapitalize($str)
{
    // Explode the input string into an array of words
    $words = explode(' ', $str);

    // Capitalize the first letter of each word in the array
    // We use the built-in PHP function 'ucfirst' to do this
    // 'ucfirst' makes the first character of a string uppercase
    // We apply 'ucfirst' to every element of the array using 'array_map'
    $capitalizedWords = array_map('ucfirst', $words);

    // Join the array of capitalized words back into a string
    // Each word is separated by a space
    return implode(' ', $capitalizedWords);

}

// keep this function call here  
echo LetterCapitalize(fgets(fopen('php://stdin', 'r')));

?>
