<?php
    include 'database.php'; // Include database connection

    // Query to get the common data of all books
    $sql = "SELECT Book_id, Book_title, Book_price FROM Books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead><tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Price</th>
                </tr></thead>";
        echo "<tbody>";

        // Fetch and display each row of the common data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Book_id'] . "</td>";
            echo "<td>" . $row['Book_title'] . "</td>";
            echo "<td>" . $row['Book_price'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No books found.";
    }

    // Close the connection
    $conn->close();
?>