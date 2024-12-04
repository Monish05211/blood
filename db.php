<?php
$servername = "localhost"; // Use your database server name
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "useme"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
