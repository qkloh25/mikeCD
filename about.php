<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>About the real us</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">SAKILA</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="films.php">Films</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actors.php">Actors</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="about.php">About Us</a>
            </li>
            <?php 
          if(isset($_SESSION["USERNAME"])){
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Staff System
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="customers.php">Customers</a>
              <a class="dropdown-item" href="rentals.php">Rentals</a>
              <a class="dropdown-item" href="stock.php">Stock</a>
              <a class="dropdown-item" href="company.php">Company</a>
            </div>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="includes/logout.php">Logout</a>
              </li><li class="nav-item nav-link" style="pointer-events:none">Staff:'.$_SESSION['USERNAME'].'</li>';

            }
            else{
                echo'<li class="nav-item">
                <a class="nav-link" href="staff.php">Staff Login</a>
              </li>';
            }
            ?>
            
          </ul>
        </div>
      </div>
    </nav>
  

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">About
      <small>This is a student project.</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">About</li>
    </ol>

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" src="img/team.jpg" alt="">
      </div>
      <div class="col-lg-6">
        <h2>About Us</h2>
        <p>This is not a real business website but a group of student coding and practising on databases and interfaces.</p>
        <p>However they are working as hard as possible to simulate a real business website which you are browsing now, a DVD rent store with some function of searching movie and an interface system for employees to managa the database.</p>
        <p>If you think this website is nice please remember those face below. Noted that this website is made based on a open sources CSS interface. Only functions, data manipulations and some interface modification are made by the students.
          <br>Source:https://blackrockdigital.github.io/startbootstrap-modern-business/</p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Team Members -->
    <h2>Our Team</h2>

    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="img/lauyuxuan.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Lau Yu Xuan</h4>
            <h6 class="card-subtitle mb-2 text-muted">Year 1 Student</h6>
            <p class="card-text">......</p>
          </div>
          <div class="card-footer">
            <a href="#">hcyyl3@nottingham.edu.my</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="img/ooihanwei.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Ooi Han Wei</h4>
            <h6 class="card-subtitle mb-2 text-muted">Year 1 Student</h6>
            <p class="card-text">HAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHA!!!!!!</p>
          </div>
          <div class="card-footer">
            <a href="#">hcyho1@nottingham.edu.my</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="img/limyiyong.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Lim Yi Yong</h4>
            <h6 class="card-subtitle mb-2 text-muted">Year 1 Student</h6>
            <p class="card-text">Wanna have dinner with me?</p>
          </div>
          <div class="card-footer">
            <a href="#">hcyyl4@nottingham.edu.my</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="img/lohqiankai.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Loh Qian Kai</h4>
            <h6 class="card-subtitle mb-2 text-muted">Handsome</h6>
            <p class="card-text">Handsome.</p>
          </div>
          <div class="card-footer">
            <a href="#">hcyql1@nottingham.edu.my</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Our Customers -->
    <h2>Our Customers</h2>
    <div class="row">
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="img/customer1.jpeg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="img/customer2.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="img/customer3.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="img/customer4.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="img/customer5.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="img/customer6.jpg" alt="">
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
