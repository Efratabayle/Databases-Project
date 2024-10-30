<?php 
// Database connection parameters
include("database.php");  // Ensure this file contains your database connection logic

// Fetch data from the Members table
$sql = "
    SELECT Member_id, First_name, Last_name, Address, State, City, Pin_code, Contact_no
    FROM Members
";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr>
            <th>Member ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>State</th>
            <th>City</th>
            <th>Pin Code</th>
            <th>Contact Number</th>
          </tr></thead>";
    echo "<tbody>";
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Member_id'] . "</td>";
        echo "<td>" . $row['First_name'] . "</td>";
        echo "<td>" . $row['Last_name'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['State'] . "</td>";
        echo "<td>" . $row['City'] . "</td>";
        echo "<td>" . $row['Pin_code'] . "</td>";
        echo "<td>" . $row['Contact_no'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No members found.";
}

// Close the connection
$conn->close();
?>
