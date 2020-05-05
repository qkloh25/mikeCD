<!DOCTYPE html>
<html lang="en">

<head>
<?php
    session_start();
    require "includes/condb.php";
    $rentalid = $_GET['rentalid'];
    if(!isset($_SESSION["USERNAME"])){
            die("Page not found");
          }
    $sql = "SELECT film.rental_rate, rental.customer_id,inventory.store_id,inventory.film_id, rental.inventory_id, film.title,rental_date,return_date,CONCAT(customer.first_name,' ',customer.last_name) AS cname,CONCAT(staff.first_name,' ',staff.last_name) AS sname FROM rental JOIN customer ON customer.customer_id=rental.customer_id JOIN staff ON staff.staff_id = rental.staff_id JOIN inventory ON inventory.inventory_id=rental.inventory_id JOIN film ON inventory.film_id = film.film_id WHERE rental_id=".$rentalid;
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $inventoryid= $row['inventory_id'];
      $filmname = ucwords(strtolower($row['title']));
      $returndate = $row['return_date'];
      $rentaldate = $row['rental_date'];
      $cname = ucwords(strtolower($row['cname']));
      $sname =$row['sname'];
      $filmid = $row['film_id'];
      $store = $row['store_id'];
      $customerid=$row['customer_id'];
      $rentalrate = $row['rental_rate'];


      $sql = "SELECT rental_id,payment_id, amount, payment_date, amount,CONCAT(staff.first_name,' ',staff.last_name) AS ssname FROM payment JOIN staff ON payment.staff_id = staff.staff_id WHERE rental_id=".$rentalid;
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $paymentid = $row['payment_id'];
      $amount = $row['amount'];
      $ssname = $row['ssname'];
      $paymentdate = $row['payment_date'];
      
      
    ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rental</title>

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
    <h1 class="mt-4 mb-3">Rental
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      
      <li class="breadcrumb-item active">Staff System</li>
      <li class="breadcrumb-item active"><a href = "rentals.php">Rentals</a></li>
      <li class="breadcrumb-item active">Rental</li>
    </ol>
    
  </div>
  <!-- /.container -->
  <div class="container">
      <?php
      if(empty($returndate)){
        echo "<button onclick='payreturn()'> Return and Pay</button>";

      }
      ?>
  
    <table>
        <tr><th>Rental Id:</th><td><?php echo $rentalid;?></td></tr>
        <tr><th>Inventory Id:</th><td><a href="inventory.php?inventoryid=<?php echo $inventoryid;?>"><?php echo $inventoryid;?></a></td></tr>
        <tr><th>Film Title:</th><td><a href="profile.php?filmid=<?php echo $filmid?>"><?php echo $filmname?></a></td></tr>
        <tr><th>Rental Date:</th><td><?php echo $rentaldate?></td></tr>
        <tr><th>Return Date:</th><td><?php echo $returndate?></td></tr>
        <tr><th>Customer:</th><td><a href = "customer.php?customerid=<?php echo $customerid;?>"><?php echo $cname?></a></td></tr>
        <tr><th>Staff:</th><td><?php echo $sname?></td></tr>
        <tr><th>Store:</th><td><?php echo $store?></td></tr>
        
    
        
    </table>
    <br>
    <h2>Payment</h2>
    <br>
    <table>
        <tr><th>Payment Id:</th><td><?php echo $paymentid;?></td></tr>
        <tr><th>Amount:</th><td><?php echo $amount;?></td></tr>
        <tr><th>Payment Date</th><td><?php echo $paymentdate?></td></tr>
        <tr><th>Staff:</th><td><?php echo $ssname?></td></tr>
        
    
        
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
  <script>
      function payreturn(){
          var extracharge;
          var amount = prompt("The basic rental rate is <?php echo $rentalrate?>, any extra fee charge?","0");
          if(amount == null){
              extracharge = 0;
          }else{
              extracharge = amount;
              document.location = 'pay.php?extracharge='+extracharge+'&rentalid='+<?php echo $rentalid?>;
          }
          

    
      }
  </script>




</body>

</html>
<!-- -->