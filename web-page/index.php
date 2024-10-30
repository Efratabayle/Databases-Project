<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .jumbotron{
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #e9ecef;
        border-radius: 0.3rem;
      }
    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Include Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Home page  -->
     <div class="jumbotron">
      <div class="container">
        <img src="../img/logo.png" class="rounded float-start" alt="Logo" height="200" style="margin-right: 20px;" />
        <h1 class="display-4">
          Hello, readers!
        </h1>
        <p>
          Welcome to Scholars' Haven Library. We have a large collection of books to cater the reading needs of all kinds of readers.
        </p>
        <p>
          <a role="button" class="btn btn-primary btn-lg" href="display_books_in_web_page.php">Browse our collection >></a>
        </p>
      </div>
     </div>

     <div class="container">
      <div class="row">
        <div class="col">
          <h2>
            Why reading is important?
          </h2>
          <p>
            Reading is good for you because it improves your focus, memory, empathy, and communication skills. It can reduce stress, improve your mental health, and help you live longer. Reading also allows you to learn new things to help you succeed in your work and relationships.
          </p>
        </div>
        <div class="col">
          <h2>
            Key Benefits
          </h2>

          <ul>
            <li>Increase your vocabulary and comprehension skills.</li>
            <li>Reduce stress.</li>
            <li>Improve mental health.</li>
            <li>Prevents cognitive decline.</li>
          </ul>
        </div>
        <div class="col">
          <h2>
            Thought for the day!
          </h2>
          <p>
            "Just don't give up trying to do what you really want to do. Where there is love and inspiration, I don't think you can go wrong." - Ella Fitzgerald
          </p>
        </div>
      </div>
      <hr />
    </div>

    <footer class="container">
      <p>
        &#169 Scholars' Haven Library 2024 
      </p>
    </footer>
  </body> 
</html>
