<?php
$servername = "localhost"; // Change to your server name
$username = "root";        // Change to your MySQL username
$password = "password";            // Change to your MySQL password
$dbname = "test"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
