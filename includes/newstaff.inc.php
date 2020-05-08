<?php
if(isset($_POST["staff-submit"])){
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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    if(empty($firstname)||empty($lastname)||empty($email)||empty($phone)||empty($address)||empty($district)||empty($city)||empty($postalcode)){
        echo "<script type='text/javascript'>alert('Please fill in all necessary fields!');window.location.href = '../newstaff.php?error=emptyfields';</script>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script type='text/javascript'>alert('Invalid Email!');window.location.href = '../newstaff.php?error=invalidemail';</script>";
    }
    else if($password !== $password2){
        echo "<script type='text/javascript'>alert('Password Not Macthed!');window.location.href = '../newstaff.php?error=emptyfields';</script>";
    }
    else { 
        $sql ="SELECT email,staff_id FROM staff WHERE email = '".$email."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        

      if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $staffid=$row['staff_id'];
        echo "<script type='text/javascript'>alert('Email existed! Staff id :".$staffid."');window.location.href = '../newstaff.php?error=emailused';</script>";
    }else{
        $sql ="SELECT city_id FROM city WHERE city = '".$city."'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
        $row = mysqli_fetch_assoc($result);
        $cityid = $row['city_id'];
        }else{
            echo "<script type='text/javascript'>alert('No city found!');window.location.href = '../newstaff.php?error=nocity';</script>";
        }

        $sql = "INSERT INTO address (address,district, city_id, postal_code, phone) VALUES('".$address."','".$district."',".$cityid.",".$postalcode.",".$phone.")";
        $result1 = mysqli_query($conn,$sql);
        
        if ($result1==1){
            $last_id = $conn->insert_id;
            $hashpwd = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO staff (store_id,first_name, last_name, email, address_id,active,username,password) VALUES(".$store.",'".$firstname."','".$lastname."','".$email."',".$last_id.",1,'".$username."','".$hashpwd."')";
            $result2 = mysqli_query($conn,$sql);
            if($result2==1){
            echo "<script type='text/javascript'>alert('Insert Successfully!');window.location.href = '../newstaff.php?insert=success';</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Insert Failed! Value out of range!');window.location.href = '../newstaff.php?error=sqlerror';</script>";

            }
        }else{
            echo "<script type='text/javascript'>alert('Insert Failed! Value out of range!');window.location.href = '../newstaff.php?error=sqlerror';</script>";
        }
        

    }
    }
}else{
    header("Location: ../newstaff.php");
    exit();
}