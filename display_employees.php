<?php 
// Database connection parameters
include("database.php");  // Ensure this file contains your database connection logic

// Fetch common data from the Employees table
$sql = "
    SELECT Employees.Employee_id, Employee_name, Designation, Mobile_no
    FROM Employees
";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Designation</th>
            <th>Mobile Number</th>
          </tr></thead>";
    echo "<tbody>";
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Employee_id'] . "</td>";
        echo "<td>" . $row['Employee_name'] . "</td>";
        echo "<td>" . $row['Designation'] . "</td>";
        echo "<td>" . $row['Mobile_no'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No employees found.";
}

// Close the connection
$conn->close();
?>
