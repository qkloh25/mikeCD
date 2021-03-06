<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if(!isset($_SESSION["USERNAME"])){
    die("Page not found");
  }
  
  
  
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Film</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <?php 
    require "includes/condb.php";
  ?> 
  <style>
    .firstcolumn{
        width:90px;
    }
    td{
        border:1px solid black;
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
    <h1 class="mt-4 mb-3">Rentals
      
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Staff System</li>
      <li class="breadcrumb-item active">Rentals</li>
    </ol>

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
      <table>
        <tr>
        <th class = "firstcolumn">Rental Id</th>
        <th class = "firstcolumn">Rental Date</th>
        <th class = "firstcolumn">Return Date</th>
        <th class = "firstcolumn">Inventory Id</th>
        <th class = "firstcolumn">Staff</th>
        <th class = "firstcolumn">Store Id</th>
        </tr>
      <?php
      if(isset($_POST['search'])){
        $search = $_POST['search'];
        $sql = "SELECT rental_id, rental_date, return_date, rental.inventory_id, CONCAT(staff.first_name,' ', staff.last_name) AS name, staff.store_id  FROM rental JOIN staff ON staff.staff_id=rental.staff_id JOIN inventory ON inventory.inventory_id=rental.inventory_id WHERE rental_id=".$_POST['search']." ;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
          
        if ($resultCheck >0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td class='firstcolumn'><a href='rental.php?rentalid=".$row['rental_id']."'>".$row['rental_id']."</a></td><td>".$row['rental_date']."</td><td>".$row['return_date']."</td><td><a href='inventory.php?inventoryid=".$row['inventory_id']."'>".$row['inventory_id']."</a></td><td>".$row['name']."</td><td>".$row['store_id']."</td></tr>";
          }
        }else{
            echo "-----------------------------NO RECORD-----------------------------";
        }

        

      }
      else if(isset($_GET['return'])){
        
        $sql = "SELECT rental_id, rental_date, return_date, rental.inventory_id, CONCAT(staff.first_name,' ', staff.last_name) AS name, staff.store_id  FROM rental JOIN staff ON staff.staff_id=rental.staff_id JOIN inventory ON inventory.inventory_id=rental.inventory_id WHERE return_date IS NULL ORDER BY rental_id DESC ;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
          
        if ($resultCheck >0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td class='firstcolumn'><a href='rental.php?rentalid=".$row['rental_id']."'>".$row['rental_id']."</a></td><td>".$row['rental_date']."</td><td>".$row['return_date']."</td><td><a href='inventory.php?inventoryid=".$row['inventory_id']."'>".$row['inventory_id']."</a></td><td>".$row['name']."</td><td>".$row['store_id']."</td></tr>";
          }
        }else{
            echo "-----------------------------NO RECORD-----------------------------";
        }


      }
      else{
   
      
      $sql = "SELECT rental_id, rental_date, return_date, rental.inventory_id, CONCAT(staff.first_name,' ', staff.last_name) AS name, staff.store_id  FROM rental JOIN staff ON staff.staff_id=rental.staff_id JOIN inventory ON inventory.inventory_id=rental.inventory_id ORDER BY rental_id DESC LIMIT 1000;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
        
      if ($resultCheck >0){
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr><td class='firstcolumn'><a href='rental.php?rentalid=".$row['rental_id']."'>".$row['rental_id']."</a></td><td>".$row['rental_date']."</td><td>".$row['return_date']."</td><td><a href='inventory.php?inventoryid=".$row['inventory_id']."'>".$row['inventory_id']."</a></td><td>".$row['name']."</td><td>".$row['store_id']."</td></tr>";
        }
      }
      }
    ?>
    </table>
        

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body" style="margin-top:-25px;">
            
              <form action="rentals.php" method="post" class="form-inline p-3">
              <input type="text"class="form-control " style ="width:70%;"id="search" name="search" placeholder="Search">
              <input type="submit" name="submit" value="search" class="btn  " style="background-color:skyblue; width:30%;" >
              </form>
                
              
            </div>
            <div class="col-md-5" style="position:flex; margin-left:23px; margin-top:-30px;">
              <div class="list-group" id = "show-list" style="width:200px;">
                
                
              
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Rentals</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="rentals.php?return=0">Unsettled</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        

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
  <script type= "text/javascript">
    $(document).ready(function(){
      $("#search").keyup(function(){
        var searchText = $(this).val();
        if(searchText!=''){
          $.ajax({
            url:'action4.php',
            method:'post',
            data:{query:searchText},
            success:function(response){
              $("#show-list").html(response);
            }
          });
          }
          else{
            $("#show-list").html('');
          }
      });
      $(document).on('click','a',function(){
            $('#search').val($(this).text());
            $("#show-list").html('');
      });
    });
  </script>

</body>

</html>
