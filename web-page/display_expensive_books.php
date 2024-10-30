<?php
// Database connection parameters
include("../database.php");

// SQL query to get the top 3 most expensive books
$sql = "SELECT book_title, book_price FROM Books ORDER BY book_price DESC LIMIT 3";
$result = $conn->query($sql);

// HTML header
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expensive Books List</title>
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

<!-- Displaying the top 3 expensive books -->
<div class="container mt-4">
    <h2 class="text-center">Top 3 Most Expensive Books</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Book Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are results and display them
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . htmlspecialchars($row["book_title"]) . "</td><td>$" . number_format($row["book_price"], 2) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='text-center'>No results found</td></tr>";
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
