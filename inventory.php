<!DOCTYPE html>
<html lang="en">

<head>
<?php
    session_start();
    require "includes/condb.php";
    $inventoryid = $_GET['inventoryid'];
    if(!isset($_SESSION["USERNAME"])){
            die("Page not found");
          }
    $sql = "SELECT * FROM inventory JOIN film ON inventory.film_id=film.film_id WHERE inventory_id=".$inventoryid;
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $filmid = $row['film_id'];
      $filmname = ucwords(strtolower($row['title']));
      $store = $row['store_id'];
      $available = $row['available']
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
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      
      <li class="breadcrumb-item active">Staff System</li>
      <li class="breadcrumb-item active"><a href="stock.php">Stock</a></li>
      <li class="breadcrumb-item active"><a href = "inventories.php">Inventories</a></li>
      <li class="breadcrumb-item active">Inventory</li>
    </ol>
    
  </div>
  <!-- /.container -->
  <div class="container">
  <?php
  if(isset($_SESSION['USERNAME'])){
      echo "<a href='includes/available.php?available=".$available."&inventoryid=".$inventoryid."'><button>available</button></a>";
  }
  ?>
    <table>
        <tr><th>Inventory ID:</th><td><?php echo $inventoryid;?></td></tr>
        <tr><th>Store:</th><td><?php echo $store;?></td></tr>
        <tr><th>Film name:</th><td><a href="profile.php?filmid=<?php echo $filmid?>"><?php echo $filmname?></a></td></tr>
        <tr><th>Avalaible:</th><td><?php echo $available?></td></tr>
        
    
        
    </table>
    <table>
        <tr><th>Rental Id</th><th>Rental Date</th><th>Return Date</th><th>Customer</th><th>Staff</th></tr>
        <?php
            $sql = "SELECT customer.customer_id,rental_id,inventory_id,CONCAT(customer.first_name,' ',customer.last_name) AS name, rental_date,return_date, CONCAT(staff.first_name,' ',staff.last_name) AS sname FROM rental JOIN customer on rental.customer_id=customer.customer_id JOIN staff ON staff.staff_id = rental.staff_id WHERE rental.inventory_id =".$inventoryid." ORDER BY return_date ASC";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td><a href='rental.php?rentalid=".$row['rental_id']."'>".$row['rental_id']."</td><td>".$row['rental_date']."</td><td>".$row['return_date']."</td><td><a href='customer.php?customerid=".$row['customer_id']."'>".ucwords(strtolower($row['name']))."</a></td><td>".$row['sname']."</td></tr>";
            }
            }else{
                echo "<tr><h1>No rental record</h1></tr>";
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