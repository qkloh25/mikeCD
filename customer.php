<!DOCTYPE html>
<html lang="en">

<head>
<?php
    session_start();
    if(!isset($_SESSION["USERNAME"])){
      die("Page not found");
    }
    require "includes/condb.php";
    $customerid = $_GET['customerid'];
    $sql = "SELECT CONCAT(first_name,' ',last_name) AS name, email,address_id,active FROM customer WHERE customer_id =".$customerid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
            $row = mysqli_fetch_assoc($result);
            $customername=ucwords(strtolower($row['name']));
            $email=$row['email'];
            $addressid = $row['address_id'];
            $customeractive = $row['active'];
        }
    
    $sql = "SELECT * FROM address WHERE address_id =".$addressid.";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $phone = $row['phone'];
        $address = $row['address'];
        $district = $row['district'];
        $cityid = $row['city_id'];
        $postcode = $row['postal_code'];


    }
    $sql = "SELECT * FROM address WHERE address_id =".$addressid.";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $phone = $row['phone'];
        $address = $row['address'];
        $district = $row['district'];
        $cityid = $row['city_id'];
        $postcode = $row['postal_code'];


    }
    $sql = "SELECT * FROM city JOIN country ON city.country_id = country.country_id WHERE city_id =".$cityid.";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $city= $row['city'];
        $country = $row['country'];


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
      .record td{
          text-align:center;
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
    <h1 class="mt-4 mb-3"><?php echo $customername?>
      
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item">Staff System
      </li>
      <li class="breadcrumb-item active"><a href="customers.php">Customers</a></li>
      <li class="breadcrumb-item">
        <?php echo $customername;?>
      </li>
    </ol>
    
  </div>
  <!-- /.container -->
  <div class="container">
     <a href = "updatecustomer.php?customerid=<?php echo $customerid;?>"><button style = 'margin-right:20px'>Update Profile</button></a><button onclick="newrent()">New Rent</button>
    <table>
        <tr><th>Customer ID:</th><td><?php echo $customerid ?></td></tr>
        <tr><th>Name:</th><td><?php echo $customername; ?></td></tr>
        <tr><th>Email:</th><td><?php echo $email;?></td></tr>
        <tr><th>Phone:</th><td><?php echo $phone;?></td></tr>
        <tr><th>Active:</th><td><?php echo $customeractive;?></td></tr>
        <tr><th>Address:</th><td><?php echo $address.", ".$district.", ".$city.", ".$country;?></td></tr>
        </table>
    <table class="record">
        <?php
            $sql = "SELECT rental.rental_id AS rentalid, rental_date, inventory_id, return_date, rental.staff_id AS staffid1,payment_id, amount,payment.staff_id AS staffid2 from rental JOIN payment ON payment.rental_id=rental.rental_id WHERE rental.customer_id =".$customerid." ORDER BY return_date ASC,rental.rental_id DESC;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck >0){
                echo "<tr><th>Rental ID</th><th>Inventory ID</th><th>Staff ID</th><th style='width:180px;'>Rental Date</th><th style='width:180px;'>Return Date</th><th>PaymentID</th><th>Staff ID</th><th>Amount</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td><a href='rental.php?rentalid=".$row['rentalid']."'>".$row['rentalid']."</a></td><td><a href = 'inventory.php?inventoryid=".$row['inventory_id']."'>".$row['inventory_id']."<a></td><td>".$row['staffid1']."</td><td>".$row['rental_date']."</td><td>".$row['return_date']."</td><td>".$row['payment_id']."</td><td>".$row['staffid2']."</td><td>".$row['amount']."</td></tr>";
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
  <script>
      function newrent(){
  
          var inid = prompt("Inventory Id:"," ");
          if(inid == null){

              
          }else{
            
              document.location = 'newrent.php?inid='+inid+'&customerid='+<?php echo $customerid?>;
          }
          

    
      }
  </script>

</body>

</html>
<!-- -->