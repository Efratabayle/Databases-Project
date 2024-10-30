<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add New Vendor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Improved CSS Styling */
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    .navbar-custom {
      background-color: #0000FF; /* Blue background */
      color: #ffffff; /* White text color */
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: #ffffff;
    }
    .navbar-custom .nav-link:hover {
      color: #cccccc; /* Light gray on hover */
    }
    .form-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      width: 350px;
      display: flex;
      flex-direction: column;
      text-align: center;
      align-items: center;
      justify-content: center;
      margin: auto; /* Center horizontally */
    }
    .form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
    }
    .form-container h1 {
      font-size: 26px;
      margin-bottom: 25px;
      color: #333;
    }
    .form-container input[type="text"],
    .form-container input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    .form-container input[type="text"]:focus {
      border-color: #0000FF;
      outline: none;
      box-shadow: 0 0 8px rgba(0, 0, 255, 0.2);
    }
    .form-container input[type="submit"] {
      background-color: #0000FF;
      color: #ffffff;
      cursor: pointer;
      border: none;
      font-size: 18px;
      transition: background-color 0.3s ease;
    }
    .form-container input[type="submit"]:hover {
      background-color: #0000cc;
    }
    .form-container input[type="submit"]:active {
      background-color: #000099;
    }
    .alert-custom {
      width: 350px;
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      text-align: center;
      align-items: center;
      justify-content: center;
      margin: auto; /* Center horizontally */
    }
  </style>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Include Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Form Wrapper -->
  <div class="form-wrapper">
    <div class="form-container">
      <h1>Add New Vendor</h1>
      <!-- Form submission goes to 'add_vendor.php' -->
      <form action="../add_vendor.php" method="POST">
        <input type="text" id="vendor_code" name="vendor_code" placeholder="Vendor Code" required>
        <input type="text" id="contact_no" name="contact_no" placeholder="Contact Number" required>
        <input type="submit" value="Add Vendor">
      </form>
    </div>
  </div>

  <!-- Alert Placeholder for Form Feedback -->
  <div id="alertPlaceholder" class="alert-custom"></div>

  <script>
    // JavaScript to handle form submission, display input values, and show feedback
    document.getElementById("addVendorForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form input values
      const vendorCode = document.getElementById("vendor_code").value;
      const contactNo = document.getElementById("contact_no").value;

      // Display input values in the console
      console.log("Vendor Code:", vendorCode);
      console.log("Contact Number:", contactNo);

      // Display success message
      const alertPlaceholder = document.getElementById("alertPlaceholder");
      alertPlaceholder.innerHTML = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Vendor details submitted successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      `;

      // Reset the form fields
      this.reset();
    });
  </script>
</body>
</html>
