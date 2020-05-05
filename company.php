<!DOCTYPE html>
<html lang="en">

<head>
<?php
    session_start();
    if(!isset($_SESSION["USERNAME"])){
      die("Page not found");
    }
    require "includes/condb.php";
        
    
    
      
        
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
            <a class="nav-link " href="films.php">Films</a>
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
            <div class="dropdown-menu dropdown-menu-right accordion" aria-labelledby="navbarDropdownBlog">
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
    <h1 class="mt-4 mb-3">Company
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Staff System</li>
      <li class="breadcrumb-item">Company</li>
    </ol>
    
  </div>
  <!-- /.container -->
  <div class="container">
      <h3>Staff</h3>
    <a href="newstaff.php"><button>New Staff</button> <a>
    <table caption-side:top>
        
        <tr><th>Staff ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>StoreID</th><th>Active</th></tr>
            <?php 
            $sql = "SELECT staff_id, CONCAT(first_name, ' ',last_name) AS name, email, address.phone,CONCAT(address.address,', ',address.district,', ',city.city,', ',country.country) AS address, staff.store_id, active FROM staff JOIN address ON staff.address_id= address.address_id JOIN city ON address.city_id = city.city_id JOIN country on city.country_id = country.country_id;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck >0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['staff_id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['store_id']."</td><td>".$row['active']."</td></tr>";

                }
            }
            ?>
    </table>
    <hr>
    <h2>Stores</h2>
    
    <table>
       
    <tr><th>Store ID</th><th>Store Name</th><th>Manager</th><th>Address</th><th>Phone</th></tr>

    <?php 
            $sql = "SELECT store.store_id, address.district, address.phone,CONCAT(address.address,', ',address.district,', ',city.city,', ',country.country) AS address, staff.first_name AS name FROM store JOIN staff ON store.manager_staff_id = staff.staff_id JOIN address ON store.address_id= address.address_id JOIN city ON address.city_id = city.city_id JOIN country on city.country_id = country.country_id;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck >0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['store_id']."</td><td>".$row['district']."</td><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['phone']."</td><td></tr>";

                }
            }
            ?>

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