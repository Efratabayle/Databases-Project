<?php 
// Database connection parameters
include("database.php");  // Assuming you have a separate file for database connection

// Fetch data from the Vendor table
$sql = "SELECT Vendor_code, Contact_no FROM Vendor";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Vendor Code</th><th>Contact Number</th></tr>";
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Vendor_code'] . "</td>";
        echo "<td>" . $row['Contact_no'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No vendors found.";
}

// Close the connection
$conn->close();
?>
