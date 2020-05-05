
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION["USERNAME"])){
    die("Page not found");
  }
  $customerid = $_GET['customerid'];
  require "includes/condb.php";
  $sql = "SELECT store_id,first_name,last_name,CONCAT(first_name,' ',last_name) AS name, email,address_id,active FROM customer WHERE customer_id =".$customerid.";";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
            
            $row = mysqli_fetch_assoc($result);
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $customername=ucwords(strtolower($row['name']));
            $email=$row['email'];
            $addressid = $row['address_id'];
            $customeractive = $row['active'];
            $store = $row['store_id'];
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
        $country = $row['country'];}
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SAKILA</title>

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
    <h1 class="mt-4 mb-3">Update Customer
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Staff System</li>
      <li class="breadcrumb-item active"><a href = "customers.php">Customers</a></li>
      <li class="breadcrumb-item"><a href = "customer.php?customerid=<?php echo $customerid;?>">
        <?php echo $customername;?></a>
      </li>
      <li class="breadcrumb-item active">Update Customer</li>
    </ol>

    
  </div>
  <!-- /.container -->
  <div class= "container">
      <form action ="includes/updatecustomer.inc.php?customerid=<?php echo $customerid?>" method="post">
      <table>
      <tr><th>First Name:</th><td><input type="text" name="firstname" value=<?php echo $firstname;?>> *</td></tr>
      <tr><th>Last Name:</th><td><input type="text" name="lastname" value=<?php echo $lastname;?>> *</td></tr>
      <tr><th>Store: *</th><td><input type="radio" name="store" value =1 <?php if ($store == 1){echo "checked";} ?>>Store 1<br><input type="radio" name="store" value =2 <?php if ($store == 2){echo "checked";}?>>Store 2<br> </td></tr>
      <tr><th>Email:</th><td><input type="text" name="email" value=<?php echo $email;?>> *</td></tr>
      <tr><th>Phone:</th><td><input type="text" name="phone" value= <?php echo $phone;?>></td></tr>
      <tr><th>Address:</th><td><input type="text" name="address" size="100" value=<?php echo $address;?>> * </td></tr>
      <tr><th>Postal Code:</th><td><input type="number" name="postalcode" value=<?php echo $postcode;?>> * </td></tr>
      <tr><th>District:</th><td><input type="text" name="district" value=<?php echo $district;?>> * </td></tr>
      <tr><th>City:</th><td><input name="city" id="city" list="city1" value=<?php echo $city;?>> *</td></tr>
     <datalist id="city1" >
     <?php
         require "includes/condb.php";

         $customerid = $_GET['customerid'];
         $sql="select city from city";
         $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        

        if ($resultCheck >0){
        while($row = mysqli_fetch_assoc($result)){
         
            echo  "<option value='".$row['city']."'/>"; 
         }
        }
            
         ?>

    </datalist>
        
        </table>
        <input type="submit" name="customer-submit" style="margin-left:200px; margin-top:50px; margin-bottom:50px;">
        
        </form>
      




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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  


</body>

</html>
