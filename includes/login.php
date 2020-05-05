<?php

if(isset($_POST["login-submit"])){
    require 'condb.php';

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    if( empty($username)||empty($password)){
        header("Location: ../staff.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM staff WHERE username = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../staff.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck =password_verify($password,$row['password']);
                if($pwdCheck==false){
                    header("Location: ../staff.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['USERNAME'] = $row['username'];
                    $_SESSION['USERID'] = $row['staff_id'];
                    header("Location: ../staff.php?login=success");
                    exit();

                }
                else{
                    header("Location: ../staff.php?error=wrongpwd");
                    exit();
                }


            }
            else {
                header("Location: ../staff.php?error=nouser");
                exit();
            }

        }

    }

}else{
    header("Location: ../staff.php");
    exit();


}