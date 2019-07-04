<?php
        require "../models/menu.php";
        $queries = array();
        parse_str($_SERVER["QUERY_STRING"],$queries);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Extract form values
            $id = $_POST["itemId"];
            $filename = $_POST["item"];
            $item = $_POST["item"];
            $price = $_POST["price"];
            $tempName = $_FILES["item"]["tmp_name"];
            print_r($_FILES);
            updateFoodItem($id,$filename,$item,$price,$tempName);
            header('Location: ../admin/dashboard.php');
            // Save to DB
        }
    ?>