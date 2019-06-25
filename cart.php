<?php
    session_start();
    require "./config/dbconfig.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Extract form values
        $user = $_SESSION["userId"];
        $item = $_POST["item"];
       
        $quantity = $_POST["quantity"];
        // Save to DB
        addToCart($user,$item,$quantity);
        header('Location: index.php#cart');
    }
?>