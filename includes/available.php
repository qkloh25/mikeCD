<?php
$inventoryid=$_GET['inventoryid'];
$available=$_GET['available'];
require "condb.php";

if($available == 1){
$sql = "UPDATE inventory SET available = 0 WHERE inventory_id =".$inventoryid.";";
mysqli_query($conn,$sql);
}
if($available == 0){
$sql = "UPDATE inventory SET available = 1 WHERE inventory_id =".$inventoryid.";";
mysqli_query($conn,$sql);
}
header("Location: ../inventory.php?inventoryid=".$inventoryid);