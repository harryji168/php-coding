<!-- Have the function StringChallenge(str) take the str parameter being passed and determine if it passes as a valid password that follows the list of constraints:

1. It must have a capital letter.
2. It must contain at least one number.
3. It must contain a punctuation mark or mathematical symbol.
4. It cannot have the word "password" in the string.
5. It must be longer than 7 characters and shorter than 31 characters.

If all the above constraints are met within the string, the your program should return the string true, otherwise your program should return the string false. For example: if str is "apple!M7" then your program should return "true".
Examples
Input: "passWord123!!!!"
Output: false
Input: "turkey90AAA="
Output: true -->





<?php 

function StringChallenge($str) {
  
  // Checking the length
  if (strlen($str) < 8 || strlen($str) > 30) {
    return "false";
  }

  // Checking if the string contains "password" (case insensitive)
  if (stripos($str, 'password') !== false) {
    return "false";
  }

  // Checking for uppercase letter
  if (!preg_match('/[A-Z]/', $str)) {
    return "false";
  }

  // Checking for number
  if (!preg_match('/\d/', $str)) {
    return "false";
  }

  // Checking for punctuation mark or mathematical symbol
  if (!preg_match('/[\p{P}\p{S}]/u', $str)) {
    return "false";
  }

  // If all checks are passed
  return "true";
}
   
// keep this function call here  
echo StringChallenge(fgets(fopen('php://stdin', 'r')));  

?>
