<?php
// Database connection parameters
include("database.php");

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form input values
  $vendor_code = $_POST['vendor_code'];
  $contact_no = $_POST['contact_no'];

  // Prepare and bind the SQL statement
  $stmt = $conn->prepare("INSERT INTO Vendor (Vendor_code, Contact_no) VALUES (?, ?)");
  $stmt->bind_param("is", $vendor_code, $contact_no);  // "is" means integer and string

  // Execute the statement and check if successful
  if ($stmt->execute()) {
      echo "Vendor added successfully! Redirecting to homepage in 3 seconds...";
      header("refresh:3;url=/LibraryManagementSystem/web-page/index.php"); // Redirect to home page after 3 seconds
  } else {
      echo "Error: " . $stmt->error;
  }

  // Close the statement
  $stmt->close();
}

// Close the connection
$conn->close();
?>