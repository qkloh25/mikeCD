<?php
if(isset($_POST["customer-submit"])){
    require "condb.php";

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
        echo "<script type='text/javascript'>alert('Invalid Email!');window.location.href = '../newcustomer.php?error=invalidemail';</script>";
    }
    else { 
        $sql ="SELECT email,customer_id FROM customer WHERE email = '".$email."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        

      if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $customerid=$row['customer_id'];
        echo "<script type='text/javascript'>alert('Email existed! Customer id :".$customerid."');window.location.href = '../newcustomer.php?error=emailused';</script>";
    }else{
        $sql ="SELECT city_id FROM city WHERE city = '".$city."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $cityid = $row['city_id'];
        }else{
            echo "<script type='text/javascript'>alert('No city found!');window.location.href = '../newcustomer.php?error=nocity';</script>";
        }

        $sql = "INSERT INTO address (address,district, city_id, postal_code, phone) VALUES('".$address."','".$district."',".$cityid.",".$postalcode.",".$phone.")";
        $result1 = mysqli_query($conn,$sql);
        
        if ($result1==1){
            $last_id = $conn->insert_id;
            $sql = "INSERT INTO customer (store_id,first_name, last_name, email, address_id,active) VALUES(".$store.",'".$firstname."','".$lastname."','".$email."',".$last_id.",1)";
            $result2 = mysqli_query($conn,$sql);
            if($result2==1){
            echo "<script type='text/javascript'>alert('Insert Successfully!');window.location.href = '../newcustomer.php?insert=success';</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Insert Failed! Value out of range!');window.location.href = '../newcustomer.php?error=sqlerror';</script>";

            }
        }else{
            echo "<script type='text/javascript'>alert('Insert Failed! Value out of range!');window.location.href = '../newcustomer.php?error=sqlerror';</script>";
        }
        

    }
    }
}