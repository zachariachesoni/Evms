<?php
require 'includes/db_connection.php';

// Fetch all events
$eventsQuery = $conn->query("SELECT * FROM Events ORDER BY date DESC");
$events = $eventsQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch all users
$usersQuery = $conn->query("SELECT * FROM Users ORDER BY id DESC");
$users = $usersQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="images" href="images/logosmaller.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Administrator</title>
</head>

<body>
    <div class="admin-panel">
        <!-- Logo section -->
        <div class="logo">
            <img src="images/logosmaller.png" alt="An example image">
            <h2>Welcome administrator !</h2>
            <div class="icon-wrapper">
                <a href="landingpage.html">
                    <i class="material-symbols-outlined">Home</i>
                    <span class="icon-caption">Home</span>
                </a>
            </div>
        </div>

        <!-- Main Admin Panel Sections -->
        <div class="admin-content">
            
            <!-- Section Container for Side-by-Side Display -->
            <div class="section-container">
                <!-- First Row Sections -->
                <div class="first-row">
                    <!-- Reports Section -->
                    <div class="reports">
                       <!-- Form to update location -->
    <form id="updateLocationForm">
        <label for="locationName">Location Name:</label>
        <input type="text" id="locationName" required>
        <button type="button" onclick="updateLocation()">Update Location</button>
    </form>

    <!-- Form to update entertainment package -->
    <form id="updateEntertainmentPackageForm">
        <label for="entertainmentCost">Entertainment Package Cost:</label>
        <input type="number" id="entertainmentCost" required>
        <label for="entertainmentDetails">Entertainment Package Details:</label>
        <textarea id="entertainmentDetails" required></textarea>
        <button type="button" onclick="updateEntertainmentPackage()">Update Entertainment Package</button>
    </form>

    <!-- Form to update food package -->
    <form id="updateFoodPackageForm">
        <label for="foodCost">Food Package Cost:</label>
        <input type="number" id="foodCost" required>
        <label for="foodDetails">Food Package Details:</label>
        <textarea id="foodDetails" required></textarea>
        <button type="button" onclick="updateFoodPackage()">Update Food Package</button>
    </form>
                    </div>

                    <!-- Event List Section -->
                    <div class="event-list">
   <h3>Upcoming Events</h3>
   <ul class="events">
       <?php foreach ($events as $event): ?>
           <li>
               <h4><?= $event['name'] ?></h4>
               <p>Date: <?= $event['date'] ?></p>
               <p>Status: <?= $event['status'] ?></p>
               <!-- Add more details as needed -->
           </li>
       <?php endforeach; ?>
   </ul>
</div>
<div class="user-list">
   <h3>Users</h3>
   <ul class="users">
       <?php foreach ($users as $user): ?>
           <li>
               <h4><?= $user['username'] ?></h4>
               <p>Email: <?= $user['email'] ?></p>
               <!-- Add more details as needed -->
           </li>
       <?php endforeach; ?>
   </ul>
</div>
                </div>
                <div class="reports">
                    <h3>Website Reports</h3>
                    <!-- Display reports on website usage and visits -->
                    <div class="report-details">
                        <p>Total Users: <!-- Include dynamic data here --></p>
                        <p>Total Events: <!-- Include dynamic data here --></p>
                        <p>Total Visits: <!-- Include dynamic data here --></p>
                    </div>
                </div>
                <!-- Second Row Sections -->
                <div class="second-row">
                 
                    <!-- Edit Event Details Section -->
                   
                
                </div>
            </div>
        </div>
    </div>
 <script src="assets/js/admin.js"></script>
</body>

</html>
