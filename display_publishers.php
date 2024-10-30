<?php 
// Database connection parameters
include("database.php");  // Assuming you have a separate file for database connection

// Fetch data from the Vendor table
$sql = "SELECT Publisher_code, Publisher_name, Publisher_country FROM Publisher";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Publisher Code</th><th>Publisher Name</th><th>Publisher Country</th></tr>";
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Publisher_code'] . "</td>";
        echo "<td>" . $row['Publisher_name'] . "</td>";
        echo "<td>" . $row['Publisher_country'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No Publisher found.";
}

// Close the connection
$conn->close();
?>
