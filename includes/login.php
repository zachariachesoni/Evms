<?php
include 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // user exists
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $result->fetch_assoc()['id'];
      header("location: welcome.php");
  } else {
      echo "Your Login Name or Password is invalid";
  }

  $conn->close();
}
?>