<?php 
// Database connection parameters
include("database.php");  // Ensure this file contains your database connection logic

// Fetch data by joining Members and FacultyMember tables, showing only faculty members
$sql = "
    SELECT Members.Member_id, Members.First_name, Members.Last_name, Members.Address, Members.State, Members.City, 
           Members.Pin_code, Members.Contact_no, FacultyMember.Department
    FROM Members
    INNER JOIN FacultyMember ON Members.Member_id = FacultyMember.Member_id
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
            <th>Department</th>  <!-- Column for Department -->
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
        echo "<td>" . $row['Department'] . "</td>";  // Department will always be available
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No faculty members found.";
}

// Close the connection
$conn->close();
?>
