<?php
        require "../config/dbconfig.php";
        $queries = array();
        parse_str($_SERVER["QUERY_STRING"],$queries);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Extract form values
            $filename =$_FILES["item"]["name"];
            $item = $_POST["item"];
            $price = $_POST["price"];
            $tempName = $_FILES["item"]["tmp_name"];
            echo strlen($filename);
            if(strlen($filename)<1){
                $filename = NULL;
            }
            updateFoodItem($filename,$item,$price,$tempName);
            header('Location: ../dashboard.php');
            // Save to DB
        }
    ?>