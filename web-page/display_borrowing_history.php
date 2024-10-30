<?php
// Database connection parameters
include("../database.php");

// SQL query to get borrowing history with member names and book titles
$sql = "
SELECT Members.first_name, Members.last_name, Books.book_title, Borrowing_history.Issue_date
FROM Members
JOIN Borrowing_history ON Members.member_id = Borrowing_history.member_id
JOIN Books ON Borrowing_history.book_id = Books.book_id;
";

$result = $conn->query($sql);

// HTML header
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Borrowing History</title>
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

<!-- Displaying borrowing history -->
<div class="container mt-4">
    <h2 class="text-center">Borrowing History</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Book Title</th>
                <th>Issue Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are results and display them
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . htmlspecialchars($row["first_name"]) . "</td><td>" . htmlspecialchars($row["last_name"]) . "</td><td>" . htmlspecialchars($row["book_title"]) . "</td><td>" . htmlspecialchars($row["Issue_date"]) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No borrowing history found</td></tr>";
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
