<?php
// Database connection parameters
include("database.php");

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$state = $_POST['state'];
$city = $_POST['city'];
$pin_code = $_POST['pin_code'];
$contact_no = $_POST['contact_no'];
$member_type = $_POST['member_type'];

if ($member_type === "StudentMember") {
  $matriculation = $_POST['matriculation'];
  // Insert into Members table
  $sql = "INSERT INTO Members (First_name, Last_name, Address, State, City, Pin_code, Contact_no) 
          VALUES ('$first_name', '$last_name', '$address', '$state', '$city', '$pin_code', '$contact_no')";
  if ($conn->query($sql) === TRUE) {
    $member_id = $conn->insert_id; // Get the newly inserted Member_id
    // Insert into StudentMember table
    $sql_student = "INSERT INTO StudentMember (Member_id, Matriculation) 
                    VALUES ('$member_id', '$matriculation')";
    if ($conn->query($sql_student) === TRUE) {
      echo "New student member added successfully! Redirecting to homepage in 3 seconds...";
      header("refresh:3;/LibraryManagementSystem/web-page/index.php"); // Redirect to home page after 3 seconds
    } else {
      echo "Error: " . $sql_student . "<br>" . $conn->error;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} elseif ($member_type === "FacultyMember") {
  $department = $_POST['department'];
  // Insert into Members table
  $sql = "INSERT INTO Members (First_name, Last_name, Address, State, City, Pin_code, Contact_no) 
          VALUES ('$first_name', '$last_name', '$address', '$state', '$city', '$pin_code', '$contact_no')";
  if ($conn->query($sql) === TRUE) {
    $member_id = $conn->insert_id; // Get the newly inserted Member_id
    // Insert into FacultyMember table
    $sql_faculty = "INSERT INTO FacultyMember (Member_id, Department) 
                    VALUES ('$member_id', '$department')";
    if ($conn->query($sql_faculty) === TRUE) {
      echo "New faculty member added successfully! Redirecting to homepage in 3 seconds...";
      header("refresh:3;/LibraryManagementSystem/web-page/index.php"); // Redirect to home page after 3 seconds
    } else {
      echo "Error: " . $sql_faculty . "<br>" . $conn->error;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the connection
$conn->close();
?>
