// Create a connection to the MySQL database
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogging";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the "comment" table 
$sql = "CREATE TABLE IF NOT EXISTS comment (
    name VARCHAR(15),
    date VARCHAR(50),
    content VARCHAR(200)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'comment' created successfully or already exists";
} else {
  echo "Error creating table: " . $conn->error;
}

// Retrieve the comment data from the user
$name = $_POST['name'];
$comment = $_POST['comment'];

// Prepare the SQL query to insert the comment into the database
$sql = "INSERT INTO comment (name, date, content) VALUES ('$name', NOW(), '$comment')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
  echo "Comment added successfully";
} else {
  echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();

?>