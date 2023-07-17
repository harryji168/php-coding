**Question:**

Please write a simple PHP script that will connect to a MySQL database named 'moodleDB' on 'localhost', using username 'root' and password 'mypassword'. The script should then run a SQL query to fetch all records from a table named 'students' and display the student names.

```php
<?php
    // Write your code here
?>
```

**Answer:**

Here is a simple PHP script that accomplishes the task:

```php
<?php
    // database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "mypassword";
    $dbname = "moodleDB";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // SQL query
    $sql = "SELECT name FROM students";
    $result = $conn->query($sql);

    // check if there are any records and display
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Student Name: " . $row["name"]. "<br>";
        }
    } else {
        echo "No results";
    }

    // close connection
    $conn->close();
?>
```

Note: Always remember, for security purposes, you should never hard-code credentials in your PHP scripts. Instead, they should be stored securely and accessed via secure methods. Also, the 'root' user should not be used for application connections if at all possible due to the potential security implications. This is just a test example.