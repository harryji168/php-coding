<?php
// Connect to database
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Check request method
switch($_SERVER["REQUEST_METHOD"]) {
  case 'GET':
    // Fetch data from database
    $res = $mysqli->query("SELECT * FROM table_name");
    $rows = array();
    while($r = mysqli_fetch_assoc($res)) {
      $rows[] = $r;
    }
    print json_encode($rows);
    break;
  // Handle other request methods (POST, PUT, DELETE) here...
}

$mysqli -> close();
?>
<!-- This script connects to a MySQL database, checks the request method, and if it's a GET request,
fetches all rows from a table and sends them back as a JSON response.

For more complex APIs, you'll want to structure your code better and possibly use a framework like
Laravel or Symfony. These frameworks provide many features that can make creating APIs easier, such as
routing, request validation, error handling, and more.

Remember that this is just a very basic example. Real APIs should include error checking, input
validation, and security measures like authentication. -->