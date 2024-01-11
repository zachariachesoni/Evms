<?php
$dbhost = "127.0.0.1";
$dbuser = "root"; 
$dbpass = ""; 
$dbname = "EVMS"; 

// Create a new mysqli instance
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"; 
?>
