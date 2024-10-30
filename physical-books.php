<?php
// Database connection
include("database.php");

echo "<h1>Physical Books List</h1>";

$sql = "
    SELECT Books.Book_id, Book_title, Book_price, Book_status, 
           Physical_books.Copies_available, Physical_books.Condition_of_books
    FROM Books
    LEFT JOIN Physical_books ON Books.Book_id = Physical_books.Book_id
    WHERE Physical_books.Book_id IS NOT NULL
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Price</th>
            <th>Status</th>
            <th>Copies Available</th>
            <th>Condition of Book</th>
          </tr></thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Book_id'] . "</td>";
        echo "<td>" . $row['Book_title'] . "</td>";
        echo "<td>" . $row['Book_price'] . "</td>";
        echo "<td>" . $row['Book_status'] . "</td>";
        echo "<td>" . ($row['Copies_available'] ? $row['Copies_available'] : 'N/A') . "</td>";
        echo "<td>" . ($row['Condition_of_books'] ? $row['Condition_of_books'] : 'N/A') . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No physical books found.";
}

$conn->close();
?>
