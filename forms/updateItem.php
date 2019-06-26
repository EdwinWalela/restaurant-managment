<?php
        require "../models/menu.php";
        $queries = array();
        parse_str($_SERVER["QUERY_STRING"],$queries);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Extract form values
            $id = $_POST["id"];
            $filename = $_POST["item"];
            $item = $_POST["item"];
            $price = $_POST["price"];
            $tempName = $_FILES["item"]["tmp_name"];
            print_r($_POST);
            updateFoodItem($id,$filename,$item,$price,$tempName);
            header('Location: ../dashboard.php');
            // Save to DB
        }
    ?>