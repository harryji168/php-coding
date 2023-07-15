<!-- Have the function StringChallenge(str) read str which will contain two strings separated by a space. The first string will consist of the following sets of characters: +, *, $, and {N} which is optional. The plus (+) character represents a single alphabetic character, the ($) character represents a number between 1-9, and the asterisk (*) represents a sequence of the same character of length 3 unless it is followed by {N} which represents how many characters should appear in the sequence where N will be at least 1. Your goal is to determine if the second string exactly matches the pattern of the first string in the input.

For example: if str is "++*{5} jtggggg" then the second string in this case does match the pattern, so your program should return the string true. If the second string does not match the pattern your program should return the string false.
Examples
Input: "+++++* abcdehhhhhh"
Output: false
Input: "$**+*{2} 9mmmrrrkbb"
Output: true
  -->

<?php 

function StringChallenge($str) {
    // Split the input into the pattern and the string
    list($pattern, $string) = explode(' ', $str);

    // Use a variable to hold the regex pattern
    $regex = '';

    // Loop through the pattern characters
    for ($i = 0; $i < strlen($pattern); $i++) {
        $c = $pattern[$i];

        // Check for different character types in pattern
        if ($c === '+') {
            $regex .= '[a-zA-Z]'; // Single alphabetic character
        } elseif ($c === '$') {
            $regex .= '[1-9]'; // A number between 1-9
        } elseif ($c === '*') {
            // Check if it's followed by {N}
            if ($i < strlen($pattern) - 1 && $pattern[$i+1] === '{') {
                $end = strpos($pattern, '}', $i+1);
                if ($end !== false) {
                    // Get N
                    $n = substr($pattern, $i+2, $end - $i - 2);
                    $regex .= "(.){" . $n . "}"; // N characters sequence
                    $i = $end;
                }
            } else {
                $regex .= "(.)\\1{2}"; // 3 characters sequence
            }
        }
    }

    // Check if the string matches the pattern
    if (preg_match('/^' . $regex . '$/', $string)) {
        return 'true';
    } else {
        return 'false';
    }
}

// keep this function call here  
echo StringChallenge(fgets(fopen('php://stdin', 'r')));  
