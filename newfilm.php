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
    <h1 class="mt-4 mb-3">New Film
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Staff System</li>
      <li class="breadcrumb-item active"><a href = "stock.php">Stock</a></li>
      <li class="breadcrumb-item active">New Film</li>
    </ol>

    
  </div>
  <!-- /.container -->
  <div class= "container">
      <form action ="includes/newfilm.inc.php" method="post">
      <table>
          
      <tr><th>Title:</th><td><input type="text" name="title" size="80"> *</td></tr>
      <tr><th>Description:</th><td><input type="textbox" name="description" size="100"> *</td></tr>
      <tr><th>Release Year:</th><td><input type="number" name="releaseyear"> *</td></tr>
      <tr style="border-bottom:1px solid black;"><th>Category: *</th><td>
        <input type="radio" name="category" value=1> Action
        <input type="radio" name="category" value=2> Animation
        <input type="radio" name="category" value=3> Children
        <input type="radio" name="category" value=4> Classics
        <input type="radio" name="category" value=5> Comedy
        <input type="radio" name="category" value=6> Documentary
        <input type="radio" name="category" value=7> Drama
        <input type="radio" name="category" value=8> Family
        <input type="radio" name="category" value=9> Foreign
        <input type="radio" name="category" value=10> Games
        <input type="radio" name="category" value=11> Horror
        <input type="radio" name="category" value=12> Music
        <input type="radio" name="category" value=13> New
        <input type="radio" name="category" value=14> Sci-Fi
        <input type="radio" name="category" value=15> Sports
        <input type="radio" name="category" value=16> Travel</td></tr>

      <tr><th>Language:*</th><td><input type="radio" name="language" value=1> English<br>
      <input type="radio" name="language" value=2> Italian<br>
      <input type="radio" name="language" value=3> Japanese<br>
      <input type="radio" name="language" value=4> Mandarin<br>
      <input type="radio" name="language" value=5> French<br>
      <input type="radio" name="language" value=6> German</td></tr>
      <tr style="border-top:1px solid black;"><th>Original Language:</th><td><input type="radio" name="olanguage" value=1> English<br>
      <input type="radio" name="olanguage" value=2> Italian<br>
      <input type="radio" name="olanguage" value=3> Japanese<br>
      <input type="radio" name="olanguage" value=4> Mandarin<br>
      <input type="radio" name="olanguage" value=5> French<br>
      <input type="radio" name="olanguage" value=6> German</td></tr>
      <tr><th>Rental Duaration(Days):</th><td><input type="number" name="rentalduration"> *</td></tr>
      <tr><th>Rental Rate:</th><td><input type="number" step="0.01" name="rentalrate"> *</td></tr>
      <tr><th>Length:</th><td><input type = "number" name="length"> *</td></tr>
      <tr><th>Replacement Cost:</th><td><input type = "number" step="0.01" name="replacementcost"> *</td></tr>
      <tr><th>Rating: *</th><td><input type="radio" name="rating" value="G"> G<br>
      <input type="radio" name="rating" value="PG"> PG<br>
      <input type="radio" name="rating" value="PG-13"> RG-13<br>
      <input type="radio" name="rating" value="R"> R<br>
      <input type="radio" name="rating" value="NC-17"> NC-17</td></tr>
      <tr style="border-top:1px solid black; border-bottom:1px solid black"><th>Special Feature:</th><td><input type="checkbox" name="feature[]" value="Commentaries"> Commentaries<br>
      <input type="checkbox" name="feature[]" value="Trailers"> Trailers<br>
      <input type="checkbox" name="feature[]" value="Behind the Scenes"> Behind the scenes<br>
      <input type="checkbox" name="feature[]" value="Deleted Scenes"> Deleted Scenes
      
      <tr><th>Actors:<br>(Have to add 1 by 1)</th><td>
        <div class="field_wrapper" >
            <div>
        <input type="text" name="field_name[]" value="" class="autofill" id="search">
        <a href="javascript:void(0);" class="add_button" title="Add field" ><img src="img/add-icon.png"/></a></td></tr>
        </div>
        </div>
        
        </table>
        <div class="col-md-5" style=" margin-left:170px; margin-top:0px;">
              <div class="list-group" id = "show-list" style="width:200px;">
            </div>
        
        </table>
        <input type="submit" name="film-submit" style="margin-left:200px; margin-top:50px; margin-bottom:50px;">
        
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
  <script type="text/javascript">
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="field_name[]" value="" id="search class="autofill" /><a href="javascript:void(0);" class="remove_button"><img src="img/remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
        $(wrapper).find('input[type=text]:last').keyup(function(){
        var searchText = $(this).val();
        if(searchText!=''){
          $.ajax({
            url:'action2.php',
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
    });
    $(wrapper).find('input[class="autofill"]:last').keyup(function(){
        var searchText = $(this).val();
        if(searchText!=''){
          $.ajax({
            url:'action2.php',
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
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    $(document).on('click','a',function(){
            $(wrapper).find('input[type=text]:last').val($(this).text());
            $("#show-list").html('');
      });
   
    
});
</script><script type= "text/javascript">
    
  </script>


</body>

</html>
