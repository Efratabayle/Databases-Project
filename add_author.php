<?php
// Database connection parameters
include("database.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input values
    $author_code = $_POST['author_code'];
    $author_name = $_POST['author_name'];
    $author_subject = $_POST['author_subject'];

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Author (Author_code, Author_name, Author_subject) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $author_code, $author_name, $author_subject); // "iss" indicates integer and two strings

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "Author added successfully! Redirecting to homepage in 3 seconds...";
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
