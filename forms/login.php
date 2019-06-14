<?php
    require "../config/dbconfig.php";
    $username = $_POST["fname"];
    $pass = $_POST["pass"];
    $pass = sha1($pass);
    $row = login($username,$pass); 
    
    if(isset($row)){
        if($row["pass"] === $pass){
            if($row["userId"]  == 1){
                // Admin
                header("Location: ../dashboard.php");
            }else if($row["userId"]  == 2){
                // Normal user
                header("Location: ../index.php");
            }
        }else{
            header("Location: ../login.php?status=mismatch");
        }
    }else{
        header("Location: ../login.php?status=n/a");
    }
?>