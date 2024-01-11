<?php
include 'db_connection.php';
echo'ss';
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // collect value of input field
   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

   if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
}
?>