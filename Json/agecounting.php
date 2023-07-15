<!-- PHP Age Counting



In the PHP file, write a program to perform a GET request on the route https://coderbyte.com/api/challenges/json/age-counting which contains a data key and the value is a string which contains items in the format: key=STRING, age=INTEGER. Your goal is to count how many items exist that have an age equal to or greater than 50, and print this final value.

Example Input
{"data":"key=IAfpK, age=58, key=WNVdi, age=64, key=jp9zt, age=47"}

Example Output
2 -->
 

<?php 

  $ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $data = curl_exec($ch);
  curl_close($ch);

  // The incoming JSON data is decoded into an associative array
  $jsonObject = json_decode($data, true);

  // Counter to keep track of how many items match our criteria
  $count = 0;

  // Check if 'data' key is present in the decoded JSON object
  if (isset($jsonObject['data'])) {
  
    // Split the data by comma and space to get individual items
    $items = explode(', ', $jsonObject['data']);
    
    // Loop through each item
    foreach ($items as $item) {
    
      // Split each item by '=' to separate the key and value
      $itemData = explode('=', $item);
      
      // Check if the key is 'age' and the value is greater than or equal to 50
      if ($itemData[0] === 'age' && intval($itemData[1]) >= 50) {
      
        // If the condition is met, increment the counter
        $count++;
      }
    }
  }

  // Output the count
  echo $count;

  
?>
