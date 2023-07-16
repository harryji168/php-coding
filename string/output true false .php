<!-- Have the function StringChallenge(strArr) take the strArr parameter being passed, which will only contain a single
element, and return the string true if it is a valid number that contains only digits with properly placed decimals and
commas, otherwise return the string false. For example: if strArr is ["1,093,222.04"] then your program should return
the string true, but if the input were ["1,093,22.04"] then your program should return the string false. The input may contain characters other than digits.
Examples
Input: array("0.232567")
Output: true
Input: array("2,567.00.2")
Output: false -->

<?php
function StringChallenge($strArr)
{
    // The input should be a string of digits, commas, and at most one decimal point.
    if (preg_match("/[^0-9.,]/", $strArr[0]) || substr_count($strArr[0], ".") > 1) {
        return "false";
    }

    // Commas should only appear every three digits (from right to left), and there should not be a comma to the right of the decimal point.
    $split = explode(".", $strArr[0]);
    if (count($split) > 1 && strpos($split[1], ",") !== false) {
        return "false";
    }
    $commas = explode(",", $split[0]);
    if (count($commas) > 1) {
        if (strlen($commas[0]) > 3) {
            return "false";
        }
        for ($i = 1; $i < count($commas); $i++) {
            if (strlen($commas[$i]) != 3) {
                return "false";
            }
        }
    }

    // If none of the above conditions were met, the number is valid.
    return "true";
}

// keep this function call here  
echo StringChallenge(fgets(fopen('php://stdin', 'r')));  
