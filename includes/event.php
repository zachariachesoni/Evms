<?php
include 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
 // collect value of input field
 $date = $_POST['date'];
 $location = $_POST['location'];
 $theme = $_POST['theme'];
 $attendees = $_POST['attendees'];
 $food_package = $_POST['food_package'];
 $entertainment_package = $_POST['entertainment_package'];

 $user_id = $_SESSION["id"]; // assuming the user's ID is stored in the session

 $sql = "INSERT INTO events (user_id, date, location, theme, attendees, food_package, entertainment_package) VALUES ('$user_id', '$date', '$location', '$theme', '$attendees', '$food_package', '$entertainment_package')";

 if ($conn->query($sql) === TRUE) {
     echo "Event added successfully";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();
}
?>
