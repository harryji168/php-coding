<?php 

function StringChallenge($str) {
  $result = '';

  // Iterate through each character in the string
  for($i = 0; $i < strlen($str); $i++) {
    $char = $str[$i];

    // Check if the character is a letter
    if (ctype_alpha($char)) {
      // Convert the letter to its position in the alphabet
      $result .= ord(strtolower($char)) - 96;
    } else {
      // If not a letter, keep the character as is
      $result .= $char;
    }
  }
  
  return $result;
}
   
// keep this function call here  
echo StringChallenge(fgets(fopen('php://stdin', 'r')));  

?>
