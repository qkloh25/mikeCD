<?php
require "condb.php";
$filmid = $_GET['filmid'];

$sql = "DELETE FROM film WHERE film_id =".$filmid;
$result = mysqli_query($conn,$sql);
if ($result==0){
    echo "<script type='text/javascript'>alert('Inventory foreign key restricted!');window.location.href = '../profile.php?filmid=".$filmid."';</script>";
}
if ($result==1){
    echo "<script type='text/javascript'>alert('DELETED!');window.location.href = '../films.php';</script>";
}
