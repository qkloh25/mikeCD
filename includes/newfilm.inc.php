<?php
if(isset($_POST["film-submit"])){
    require "condb.php";

    $title = $_POST['title'];
    $description = $_POST['description'];
    $releaseyear = $_POST['releaseyear'];
    $language = $_POST['language'];
    $olanguage = $_POST['olanguage'];
    $rentalduration = $_POST['rentalduration'];
    $rentalrate = $_POST['rentalrate'];
    $length  =$_POST['length'];
    $replacementcost = $_POST['replacementcost'];
    $rating = $_POST['rating'];
    $actors = $_POST['field_name'];
    $feature = $_POST['feature'];
    $features = "";
    $category = $_POST['category'];

    foreach($feature as $featurechk){
        $features = $features.$featurechk.",";
    }
    $features = rtrim($features, ",");
    if(empty($olanguage)){
        $olanguage=0;
    }

   

    if(empty($title)||empty($description)||empty($releaseyear)||empty($language)||empty($rentalduration)||empty($rentalrate)||empty($length)||empty($replacementcost)||empty($rating)||empty($category)){
        echo "<script type='text/javascript'>alert('Please fill in all necessary fields!');window.location.href = '../newfilm.php?error=emptyfields';</script>";
       
        
    }
    else { 
        $sql ="SELECT film_id, title FROM film  WHERE title = '".$title."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        

      if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $filmid=$row['film_id'];
        echo "<script type='text/javascript'>alert('Film existed! Film id :".$filmid."');window.location.href = '../newfilm.php?error=filmused';</script>";
    }else{
        $sql = "INSERT INTO film (title,description,release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features) VALUES('".$title."','".$description."',".$releaseyear.",".$language.",".$olanguage.",".$rentalduration.",".$rentalrate.",".$length.",".$replacementcost.",'".$rating."','".$features."')";
        $result = mysqli_query($conn,$sql);
        $newfilmid = $conn->insert_id;
        if ($result==1){
            foreach($actors as $actor){
                $sql = "SELECT actor_id, CONCAT(first_name,' ',last_name) AS name FROM actor WHERE CONCAT(first_name,' ',last_name) ='".strtoupper($actor)."'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $actorid = $row['actor_id'];
                $sql = "INSERT INTO film_actor (actor_id, film_id) VALUES (".$actorid.",".$newfilmid.");";
                $result = mysqli_query($conn,$sql);

                
            }
            $sql = "INSERT INTO film_category (film_id, category_id) VALUES(".$newfilmid.",".$category.")";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            if ($result==1){
                echo "<script type='text/javascript'>alert('Insert Successfully!');window.location.href = '../newfilm.php?insert=success';</script>";
            }else{
            //echo "<script type='text/javascript'>alert('Film created!Actors not found!');window.location.href = '../newfilm.php?error=sqlerror';</script>";
            }
        }else{
           echo "<script type='text/javascript'>alert('Insert Failed! Value out of range!');window.location.href = '../newfilm.php?error=sqlerror';</script>";
        
            
        }
        
        

    }
    }
}