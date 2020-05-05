<!DOCTYPE html>
<html lang="en">

<head>
  
<?php
    session_start();
    require "includes/condb.php";
        $filmid = $_GET['filmid'];
       
        $sql = "SELECT * FROM film WHERE film_id =".$filmid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
            $row = mysqli_fetch_assoc($result);
            $filmname= ucwords(strtolower($row['title']));
            $filmdescript = $row['description'];
            $releaseyr = $row['release_year'];
            $specialfeature = $row['special_features'];
            $languageid = $row['language_id'];
            $rating = $row['rating'];
            $rentalrate= $row['rental_rate'];
            $buyprice = $row['replacement_cost'];


        }
        $sql = "SELECT * FROM language WHERE language_id =".$languageid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          $row = mysqli_fetch_assoc($result);
          $language = $row['name'];

      }
      $sql = "SELECT inventory.film_id,inventory.store_id,  count(inventory.inventory_id) AS number
      FROM inventory
      WHERE inventory.inventory_id NOT IN
            (SELECT rental.inventory_id
            FROM rental
            WHERE rental.return_date IS NULL) AND film_id =".$filmid." AND store_id=1
      GROUP BY inventory.film_id,inventory.store_id";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          $row = mysqli_fetch_assoc($result);
          $store1= $row['number'];
        }
        else{
          $store1 = 0;
        }
        $sql = "SELECT inventory.film_id,inventory.store_id,  count(inventory.inventory_id) AS number
        FROM inventory
        WHERE inventory.inventory_id NOT IN
              (SELECT rental.inventory_id
              FROM rental
              WHERE rental.return_date IS NULL) AND film_id =".$filmid." AND store_id=2
        GROUP BY inventory.film_id,inventory.store_id";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          $row = mysqli_fetch_assoc($result);
          $store2= $row['number'];
        }
        else{
          $store2 = 0;
        }
        $sql = "SELECT category.name, film_category.film_id,film_category.category_id
        FROM category 
        INNER JOIN film_category ON category.category_id = film_category.category_id
        WHERE film_id =".$filmid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          $row = mysqli_fetch_assoc($result);
          $category = $row['name'];
          $categoryid = $row['category_id'];
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
            <a class="nav-link active" href="films.php">Films</a>
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

  <!-- Page Content -->
  <div class="container">
    

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?php echo $filmname;?>
      <small>--<?php echo "<a href='category.php?categoryid=".$categoryid."'>".$category."</a>";?></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active"><a href="films.php">Films</a></li>
      <li class="breadcrumb-item">
        <?php echo $filmname;?>
      </li>
    </ol>
    
  </div>
  <!-- /.container -->
  <div class="container">
  <?php
      if(isset($_SESSION['USERNAME'])){
            echo "<button onclick='deletefilm()' style='margin-right:20px; style='margin-bottom:20px;'>DELETE FILM</button><a href='newinventory.php?filmid=".$filmid."&filmname=".$filmname."'><button style='margin-bottom:20px;'>New Inventory</button><a><br>";
      }
        ?>
        <img src="img/movie.jpg">
    <table>
        <tr><th>Film ID:</th><td><?php echo $filmid;?></td></tr>
        <tr><th>Description:</th><td><?php echo $filmdescript?></td></tr>
        <tr><th>Release-Year:</th><td><?php echo $releaseyr?></td></tr>
        <tr><th>Special Feature:</th><td><?php echo $specialfeature?></td></tr>
        <tr><th>Rating:</th><td><?php echo $rating;?></td></tr>
        <tr><th>Language:</th><td><?php echo $language; ?></td></tr>
        <tr><th>Actors:</th><td><?php $sql = "SELECT film_id, CONCAT(actor.first_name,' ',actor.last_name) AS actorname, actor.actor_id
FROM film_actor
INNER JOIN actor ON film_actor.actor_id = actor.actor_id
WHERE film_id=".$filmid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<a href = 'actor.php?actorid=".$row['actor_id']."'>".ucwords(strtolower($row['actorname']))."</a><br>";
          }
        }
        ?></td></tr>
        <tr><th>Rental Rate:</th><td><?php echo $rentalrate;?></td></tr>
        <tr><th>Buy Price:</th><td><?php echo $buyprice;?></td></tr>
        <tr><th>Store 1 Inventory:</th><td><?php echo $store1 ?></td></tr>
        <tr><th>Store 2 Inventory:</th><td><?php echo $store2 ?></td></tr>
        
    </table>
<?php 
    if(isset($_SESSION['USERNAME'])){   
      echo "<table><tr><th style='text-alignment:center;'>Inventory Id</th><th>Store Id</th><th>Avalaible</th></tr>";
      $sql = "SELECT inventory_id, store_id, available, film_id FROM inventory WHERE film_id =".$filmid;
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck >0){
        while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td><a href='inventory.php?inventoryid=".$row['inventory_id']."'>".$row['inventory_id']."</a></td><td>".$row['store_id']."</td><td>".$row['available']."</td></tr>";
        }
      }
      echo "</table>";
  }
?>
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
  <script>
      function deletefilm(){
          if(confirm("Are you sure to delete this film?")){
            document.location = 'includes/deletefilm.inc.php?filmid='+<?php echo $filmid; ?>;
          }
        }
  </script>
  

</body>

</html>
<!-- -->