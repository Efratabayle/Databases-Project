<?php
// Database connection parameters
include("../database.php");

// SQL query to get available books with authors and publishers
$sql = "
SELECT Books.book_title, Author.author_name, Publisher.publisher_name
FROM Books
JOIN Author ON Books.author_code = Author.author_code
JOIN Publisher ON Books.publisher_code = Publisher.publisher_code
WHERE Books.book_status = 'Available';
";

$result = $conn->query($sql);

// HTML header
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Available Books with Authors and Publishers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          font-family: Arial, sans-serif;
          margin: 20px;
      }
      table {
          width: 100%;
          border-collapse: collapse;
      }
      table, th, td {
          border: 1px solid black;
      }
      th, td {
          padding: 8px;
          text-align: left;
      }
      th {
          background-color: #f2f2f2;
      }
  </style>
</head>
<body>

<!-- Include Navbar -->
<?php include 'navbar.php'; ?>

<!-- Displaying available books with authors and publishers -->
<div class="container mt-4">
    <h2 class="text-center">Available Books with Authors and Publishers</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Author Name</th>
                <th>Publisher Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are results and display them
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . htmlspecialchars($row["book_title"]) . "</td><td>" . htmlspecialchars($row["author_name"]) . "</td><td>" . htmlspecialchars($row["publisher_name"]) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No available books found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Close the database connection
$conn->close();
?>
</body>
</html>
