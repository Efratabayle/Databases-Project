<?php
// Database connection
include("database.php");

echo "<h1>E-books List</h1>";

$sql = "
    SELECT Books.Book_id, Book_title, Book_price, Book_status, 
           E_books.File_format, E_books.File_size 
    FROM Books
    LEFT JOIN E_books ON Books.Book_id = E_books.Book_id
    WHERE E_books.Book_id IS NOT NULL
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Price</th>
            <th>Status</th>
            <th>File Format</th>
            <th>File Size (MB)</th>
          </tr></thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Book_id'] . "</td>";
        echo "<td>" . $row['Book_title'] . "</td>";
        echo "<td>" . $row['Book_price'] . "</td>";
        echo "<td>" . $row['Book_status'] . "</td>";
        echo "<td>" . ($row['File_format'] ? $row['File_format'] : 'N/A') . "</td>";
        echo "<td>" . ($row['File_size'] ? $row['File_size'] : 'N/A') . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No e-books found.";
}

$conn->close();
?>
