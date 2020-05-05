<?php
if(isset($_POST["customer-submit"])){
    require "condb.php";
    $customerid = $_GET['customerid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $store = $_POST['store'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    
    if(empty($firstname)||empty($lastname)||empty($email)||empty($phone)||empty($address)||empty($district)||empty($city)||empty($postalcode)){
        echo "<script type='text/javascript'>alert('Please fill in all necessary fields!');window.location.href = '../newcustomer.php?error=emptyfields';</script>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script type='text/javascript'>alert('Invalid Email!');window.location.href = '../updatecustomer.php?error=invalidemail';</script>";
    }
    else { 
        $sql ="SELECT address_id FROM customer WHERE customer_id = ".$customerid;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $addressid = $row['address_id'];

        
        $sql ="SELECT city_id FROM city WHERE city = '".$city."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $cityid = $row['city_id'];
        }else{
            echo "<script type='text/javascript'>alert('No city found!');window.location.href = '../updatecustomer.php?error=nocity';</script>";
        }

        $sql = "UPDATE address SET address='".$address."',district='".$district."', city_id=".$cityid.", postal_code=".$postalcode.", phone=".$phone." WHERE address_id=".$addressid.";";
        $result1 = mysqli_query($conn,$sql);
        
        if ($result1==1){
            
            $sql = "UPDATE customer SET store_id=".$store.",first_name = '".$firstname."', last_name = '".$lastname."', email ='".$email."', address_id = ".$addressid." WHERE customer_id=".$customerid;
            $result2 = mysqli_query($conn,$sql);
            if($result2==1){
            echo "<script type='text/javascript'>alert('Update Successfully!');window.location.href = '../customer.php?customerid=".$customerid."&insert=success';</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Update Failed! Value out of range!');window.location.href = '../customer.php?customerid=".$customerid."&error=sqlerror';</script>";

            }
        }else{
            echo "<script type='text/javascript'>alert('Update Failed! Value out of range!');window.location.href = '../customer.php?customerid=".$customerid."&error=sqlerror';</script>";
        }
        

    }
    
}