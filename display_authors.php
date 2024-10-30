<?php
// Database connection parameters
include("database.php");

// Fetch data from the Author table
$sql = "SELECT Author_code, Author_name, Author_subject FROM Author";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Author Code</th><th>Author Name</th><th>Author Subject</th></tr>";
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Author_code'] . "</td>";
        echo "<td>" . $row['Author_name'] . "</td>";
        echo "<td>" . $row['Author_subject'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No authors found.";
}

// Close the connection
$conn->close();
?>
