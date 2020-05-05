<html>
    <head>
</head>
<body>
<?php 
require "includes/condb.php";
session_start();
$inventoryid = $_GET['inid'];
$customerid = $_GET['customerid'];

$sql = "SELECT inventory_id, available from inventory where inventory_id =".$inventoryid;
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck ==1){
    $row = mysqli_fetch_assoc($result);
    if($row['available']==0){
        echo "Inventory is not available.";
        die(mysqli_error($conn));
    }
    

}else{
    echo "No such inventory.";
    die(mysqli_error($conn));
}


$sql = "INSERT INTO rental (inventory_id,rental_date,customer_id,return_date,staff_id) VALUES (".$inventoryid.",NOW(),".$customerid.",NULL,".$_SESSION['USERID'].")";
$result1 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($result1==1){
    $last_id = $conn->insert_id;
    $sql = "UPDATE inventory SET available = 0 WHERE inventory_id =".$inventoryid.";";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $sql = "INSERT payment (customer_id, staff_id,rental_id,amount, payment_date) VALUE(".$customerid.",".$_SESSION['USERID'].",".$last_id.",0,NOW())";
    $result2 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result2>0){
        echo "<script type='text/javascript'>alert('Rented!');window.location.href = 'customer.php?customerid=".$customerid."';</script>";
    }else{
        $sql = "DELETE FROM rental WHERE rental_id = ".$last_id;
        $result1 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    }

}
?>
</body>
</html>

       
        