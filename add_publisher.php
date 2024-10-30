<?php
// Database connection parameters
include("database.php");

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $publisher_code = $_POST['publisher_code'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_country = $_POST['publisher_country'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO Publisher (Publisher_code, Publisher_name, Publisher_country) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $publisher_code, $publisher_name, $publisher_country);  // "iss" means integer and two strings

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "Publisher added successfully! Redirecting to homepage in 3 seconds...";
        header("refresh:3;/LibraryManagementSystem/web-page/index.php"); // Redirect to home page after 3 seconds
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
