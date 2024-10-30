<?php 
// Database connection parameters
include("database.php");  // Ensure this file contains your database connection logic

// Fetch data for Student Assistants
$studentAssistantSql = "
    SELECT Employees.Employee_id, Employee_name, Designation, Mobile_no, StudentAssistant.Hourly_wage
    FROM Employees
    LEFT JOIN StudentAssistant ON Employees.Employee_id = StudentAssistant.Employee_id
    WHERE StudentAssistant.Employee_id IS NOT NULL
";

$studentAssistantResult = $conn->query($studentAssistantSql);

// Display Student Assistants
echo "<h2>Student Assistants</h2>";
if ($studentAssistantResult->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Designation</th>
            <th>Mobile Number</th>
            <th>Hourly Wage</th>
          </tr></thead>";
    echo "<tbody>";
    while ($row = $studentAssistantResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Employee_id'] . "</td>";
        echo "<td>" . $row['Employee_name'] . "</td>";
        echo "<td>" . $row['Designation'] . "</td>";
        echo "<td>" . $row['Mobile_no'] . "</td>";
        echo "<td>" . ($row['Hourly_wage'] ? $row['Hourly_wage'] : 'N/A') . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No student assistants found.";
}

// Close the connection
$conn->close();
?>
