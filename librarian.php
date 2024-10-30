<?php 
// Database connection parameters
include("database.php");  // Ensure this file contains your database connection logic

// Fetch data for Librarians
$librarianSql = "
    SELECT Employees.Employee_id, Employee_name, Designation, Mobile_no, Librarian.Contract_id
    FROM Employees
    LEFT JOIN Librarian ON Employees.Employee_id = Librarian.Employee_id
    WHERE Librarian.Employee_id IS NOT NULL
";

$librarianResult = $conn->query($librarianSql);

// Display Librarians
echo "<h2>Librarians</h2>";
if ($librarianResult->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Designation</th>
            <th>Mobile Number</th>
            <th>Contract ID</th>
          </tr></thead>";
    echo "<tbody>";
    while ($row = $librarianResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Employee_id'] . "</td>";
        echo "<td>" . $row['Employee_name'] . "</td>";
        echo "<td>" . $row['Designation'] . "</td>";
        echo "<td>" . $row['Mobile_no'] . "</td>";
        echo "<td>" . ($row['Contract_id'] ? $row['Contract_id'] : 'N/A') . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No librarians found.";
}

// Close the connection
$conn->close();
?>
