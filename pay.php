<html>
    <head>
</head>
<body>
<?php 
require "includes/condb.php";
$extra = $_GET['extracharge'];
$rentalid = $_GET['rentalid'];

$sql = "SELECT film.rental_rate, rental.customer_id,inventory.store_id,inventory.film_id, rental.inventory_id, film.title,rental_date,return_date,CONCAT(customer.first_name,' ',customer.last_name) AS cname,CONCAT(staff.first_name,' ',staff.last_name) AS sname FROM rental JOIN customer ON customer.customer_id=rental.customer_id JOIN staff ON staff.staff_id = rental.staff_id JOIN inventory ON inventory.inventory_id=rental.inventory_id JOIN film ON inventory.film_id = film.film_id WHERE rental_id=".$rentalid;
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck ==1){
    $row = mysqli_fetch_assoc($result);
    $rentalrate= $row['rental_rate'];
    $total = $rentalrate + $extra;
    $inventoryid = $row['inventory_id'];

}else{
    echo "wtf";
    die(mysqli_error($conn));
}


$sql = "UPDATE rental SET return_date = NOW() WHERE rental_id = ".$rentalid;
$result1 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($result1==1){
    $sql = "UPDATE payment SET amount =".$total." WHERE payment.rental_id = ".$rentalid;
    $result2 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result2>0){
        $sql = "UPDATE inventory SET available = 1 WHERE inventory_id = ".$inventoryid;
        $result3 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Returned! Successful Transaction!');window.location.href = 'rental.php?rentalid=".$rentalid."';</script>";
    }

}
?>
</body>
</html>

       
        