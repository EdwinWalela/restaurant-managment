<?php
    require "../config/dbconfig.php";
    $username = $_POST["fname"];
    $pass = $_POST["pass"];
    $pass = sha1($pass);
    $row = login($username,$pass); 

    if(isset($row)){
        if($row["pass"] === $pass){
            header("Location: ../login.php?status=ok");
        }else{
            header("Location: ../login.php?status=mismatch");
        }
    }else{
        header("Location: ../login.php?status=n/a");
    }
?>