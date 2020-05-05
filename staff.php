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

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <style>
    .d{
        border-bottom: 5px solid white !important;
    }
    .login-box{
    width:320px;
    height:380px;
    background:#000;
    color:#fff;
    
    position:flex;
 
    box-sizing: border-box;
    padding:40px 30px;
    border-radius:20px;

    }

    .login-box h1{
        margin:0;
        padding:0 0 20px;
        text-align: center;
        font-size:22px;
        padding-bottom:40px;
    }
    .login-box p{
        margin:0;
        padding:0;
        font-weight:bold;
    }
    .login-box input{
        width:100%;
        margin-bottom:20px;

    }
    .login-box input[type="text"], input[type="password"]{
        border:none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline:none;
        height:40px;
        color:#fff;
        font-size:16px;
        transition: border-bottom 0.2s;

    }
    .login-box input[type="text"]:focus, input[type="password"]:focus{
        border-bottom: 2px solid #fff;

    }
    .login-box input[type="submit"]{
        border:none;
        outline:none;
        height:40px;
        background:#fb2525;
        color:#fff;
        font-size:18px;
        border-radius:20px;

    }
    .login-box input[type="submit"]:hover{
        cursor:pointer;
        background:#ffc107;
        color:#000;

    }

    .login-box a{
        text-decoration:none;
        font-size:12px;
        line-height:20px;
        color:darkgrey;
    }

    .login-box a:hover{
        color:#ffc107;
    }
    .middle {
        display:block;
        margin:20px auto;
        width:35%;

    }
</style>

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
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link active" href="staff.php">Staff Login</a>
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
    <h1 class="mt-4 mb-3">Staff System
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Staff System</li>
    </ol>



  </div>
  <!-- /.container -->
  <div class="container">
  
    <div class= "middle">
    <?php
        if(isset($_SESSION["USERNAME"])){
            echo '<h1 class="login-box">You are logged in! '.$_SESSION['USERNAME'].'</h1>';

            }
        else{
            echo '<div class="login-box">';
            echo '<form action ="includes/login.php" method="post">';
            echo '<h1>Staff System</h1>';
            echo '<p>Username</p>';
            echo '<input type="text" name="username" placeholder="Enter username"><br>';
            echo '<p>Password</p>';
            echo '<input type="password" name="pwd" placeholder="Enter password"><br>';
            echo '<input type="submit" name = "login-submit" value="Login">';
            echo '<a onclick="newstaff()" >Not a staff?</a>';
            echo '</form>';
            echo '</div>';
        }
            ?>
        
    <script>
            function newstaff(){
                alert("Please interview first!\n012-3456789");
            }
    </script>
    </div>


  </div >

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
