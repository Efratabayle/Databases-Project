<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employees List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .filter-buttons {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .filter-buttons a {
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 0.05rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
        }
        td {
            background-color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .table-container {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
</head>
<body>

  <!-- Include Navbar -->
  <?php include 'navbar.php'; ?>

  <div class="container">
    <h1 class="mt-4">Employees List</h1>
    
    <!-- Filter Buttons to select E-books or Physical books -->
    <div class="filter-buttons">
        <a href="display_librarian.php" class="btn btn-success">Librarian</a>
        <a href="display_studentAssistant.php" class="btn btn-warning">Student Assistant</a>
    </div>

    <!-- Table Container for better structure -->
    <div class="table-container">
      <!-- Include the display_books.php script to show the book data -->
      <?php include '../display_employees.php'; ?>
    </div>
  </div>

</body>
</html>
