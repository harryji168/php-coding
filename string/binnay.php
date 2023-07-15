<!-- Have the function StringChallenge(strArr) read the array of strings stored in strArr, which will contain two elements, the first will be a positive decimal number and the second element will be a binary number. Your goal is to determine how many digits in the binary number need to be changed to represent the decimal number correctly (either 0 change to 1 or vice versa). For example: if strArr is ["56", "011000"] then your program should return 1 because only 1 digit needs to change in the binary number (the first zero needs to become a 1) to correctly represent 56 in binary.
Examples
Input: array("5624", "0010111111001")
Output: 2
Input: array("44", "111111")
Output: 3 -->

<?php 

function StringChallenge($strArr) {
  // Convert the first decimal number to binary
  $decimalToBinary = decbin($strArr[0]);
  
  // Padding zeros to make both binary strings of equal length
  $maxLength = max(strlen($decimalToBinary), strlen($strArr[1]));
  $decimalToBinary = str_pad($decimalToBinary, $maxLength, "0", STR_PAD_LEFT);
  $strArr[1] = str_pad($strArr[1], $maxLength, "0", STR_PAD_LEFT);
  
  // Count the number of differences between two binary strings
  $diffCount = 0;
  for ($i = 0; $i < $maxLength; $i++) {
    if ($decimalToBinary[$i] != $strArr[1][$i]) {
      $diffCount++;
    }
  }
  
  // Return the count of differences
  return $diffCount;
}
   
// keep this function call here  
echo StringChallenge(fgets(fopen('php://stdin', 'r')));  

?>
