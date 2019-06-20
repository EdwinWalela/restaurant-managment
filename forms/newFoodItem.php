<?php
        require "../config/dbconfig.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Extract form values
            $filename = $_POST["item"];
            $item = $_POST["item"];
            $price = $_POST["price"];
            $tempName = $_FILES["item"]["tmp_name"];
            // Save to DB
            newFoodItem($filename,$item,$price,$tempName);
            // header('Location: ../dashboard.php');
        }
    ?>