<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

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
            <a class="nav-link" href="about.php">About Us</a>
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

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('img/slider1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Never give up!</h3>
            <p>All the movies are made by hardwork.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/slider2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Movie Time!</h3>
            <p>Let's see some movies!</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/slider4.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Films are amazing!</h3>
            <p>View and audio always give us the greatest impact.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Sakila media renting services</h1>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Rent</h4>
          <div class="card-body">
            <p class="card-text">We rent DVD so you can enjoy entertainment at home at the lowest expense possible!</p>
          </div>
          <div class="card-footer">
            <a href="films.php" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Buy</h4>
          <div class="card-body">
            <p class="card-text">We sell high quality DVD for watching and collections.</p>
          </div>
          <div class="card-footer">
            <a href="films.php" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Delivery</h4>
          <div class="card-body">
            <p class="card-text">We provide delivery service, but charges extra delivery fee. The delivery service only avalable for certain area.</p>
          </div>
          <div class="card-footer">
            <a href="contact.php" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>Categories</h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=1"><img class="card-img-top" src="img/action.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=1">Action</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=2"><img class="card-img-top" src="img/animation.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=2">Animation</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=3"><img class="card-img-top" src="img/children.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=3">Children</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=4"><img class="card-img-top" src="img/classics.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=4">Classiscs</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=5"><img class="card-img-top" src="img/comedy.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=5">Comedy</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=6"><img class="card-img-top" src="img/Documentary.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=6">Documentary</a>
            </h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=7"><img class="card-img-top" src="img/drama.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=7">Drama</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=8"><img class="card-img-top" src="img/family.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=8">Family</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=9"><img class="card-img-top" src="img/foreign.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="fcategory.php?categoryid=9">Foreign</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=10"><img class="card-img-top" src="img/games.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=10">Games</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=11"><img class="card-img-top" src="img/horror.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=11">Horror</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=12"><img class="card-img-top" src="img/music.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=12">Music</a>
            </h4>
           
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=13"><img class="card-img-top" src="img/new.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=13">New</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=14"><img class="card-img-top" src="img/sci-fi.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=14">Sci-Fi</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=15"><img class="card-img-top" src="img/sports.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=15">Sports</a>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="category.php?categoryid=16"><img class="card-img-top" src="img/travel.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="category.php?categoryid=16">Travel</a>
            </h4>
            
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    
    <!-- /.row -->

    

    <!-- Call to Action Section -->

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
