<?php
if(isset($_POST["inventory-submit"])){
    require "condb.php";

    $store = $_POST['store'];
    $quantity=$_POST['quantity'];
    $filmid = $_POST['filmid'];
    
    if(empty($store)||empty($quantity)){
        echo "<script type='text/javascript'>alert('Please fill in all necessary fields!');window.location.href = '../newinventory.php?error=emptyfields';</script>";
    }
   
   else{
       while($quantity > 0){
        $sql = "INSERT INTO inventory (film_id, store_id, available) VALUES(".$filmid.",".$store.",1)";
        $result1 = mysqli_query($conn,$sql);
        $quantity-=1;

    }
    if ($result1==1){
        echo "<script type='text/javascript'>alert('Insert Successfully!');window.location.href = '../profile.php?filmid=".$filmid."&insert=success';</script>";
        
        
    }else{
        echo "<script type='text/javascript'>alert('Insert Failed! Value out of range!');window.location.href = '../newcustomer.php?error=sqlerror';</script>";
    }
}
}
