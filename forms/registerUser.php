<?php
    require "../models/auth.php";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $pass = $_POST["pass"];
    $type = $_POST["type"];
    registerUser($fname,$lname,$pass,$type);
    header("Location: ../login.php?status=ok");
    
?>