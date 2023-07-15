<?php
/**
 * @param mixed $str
 * 
 * @return [type]
 */
function StringChallenge($str) {
  $rating = round(floatval($str) * 2) / 2; // rounding the rating to the nearest half
  $full = intval($rating); // get the integer part for the full stars
  $half = ($rating * 2) % 2; // get the fractional part for the half stars, if any
  $empty = 5 - $full - $half; // get the number of empty stars

  $full_stars = array_fill(0, $full, "full");
  $half_stars = $half > 0 ? array("half") : array();
  $empty_stars = array_fill(0, $empty, "empty");

  $all_stars = array_merge($full_stars, $half_stars, $empty_stars);

  return implode(" ", $all_stars);
}

// keep this function call here
echo StringChallenge(fgets(fopen("php://stdin", 'r')));

?>
