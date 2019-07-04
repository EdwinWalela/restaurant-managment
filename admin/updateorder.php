<?php
    require "../config/dbconfig.php";

    $queries = array();
    parse_str($_SERVER["QUERY_STRING"],$queries);
    
    if(sizeof($queries) !=0 ){
        updateOrderStatus($queries["to"],$queries["orderid"]);
    }

    header("Location: ./orders.php");

?>