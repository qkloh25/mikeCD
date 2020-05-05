<?php
$servername = "localhost";
$username="hcyho1";
$password = "hanwei7lengzai";
$dbname = "hcyho1_sakila";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    header("Location: ../index.php");
    die("Connection failed:".mysqli_connect_error());
}
