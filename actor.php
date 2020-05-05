<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<head>
<?php
    require "includes/condb.php";
        $actorid = $_GET['actorid'];

        $sql = "SELECT actor.actor_id, CONCAT(actor.first_name,' ',actor.last_name) AS actorname
        FROM actor
        WHERE actor_id=".$actorid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
                $row = mysqli_fetch_assoc($result);
                $actorname = ucwords(strtolower($row['actorname']));
        }
              
        
        
      
        
    ?>
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
      table th{
          width:150px;
          border-bottom:1px solid black;
          border-right:1px solid black;
      }
      tr{
        border-bottom:1px solid black;
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
              <a class="nav-link active" href="actors.php">Actors</a>
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

  <!-- Page Content -->
  <div class="container">
    

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?php echo $actorname;?>
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active"><a href="actors.php">Actors</a></li>
      <li class="breadcrumb-item">
        <?php echo $actorname;?>
      </li>
    </ol>
    
  </div>
  <!-- /.container -->
  <div class="container">
    <table>
        <tr><th>Actor ID:</th><td><?php echo $actorid;?></td></tr>
        <tr><th>Actor Name:</th><td><?php echo $actorname;?></td></tr>
        <tr><th>Movies:</th><td><?php $sql = "SELECT film_actor.actor_id, film_actor.film_id,film.title
FROM film_actor
INNER JOIN film ON film_actor.film_id = film.film_id
WHERE actor_id=".$actorid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<a href = 'profile.php?filmid=".$row['film_id']."'>".ucwords(strtolower($row['title']))."</a><br>";
          }
        }
        ?></td></tr>   
    </table>
  </div>
  

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
<!-- -->