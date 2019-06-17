<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>


    <title>Update Item</title>
    <link rel="stylesheet" href="./static/style.css">
<?php
        require "./config/dbconfig.php";

        $queries = array();
        parse_str($_SERVER["QUERY_STRING"],$queries);

        if($_SERVER["REQUEST_METHOD"] == "GET" && $queries["food"]){
           $result = getFoodItem($queries["food"]);
           $row = $result->fetch_assoc();
        }
    ?>
</head>

<body>
<?php include './include/nav.php';?>
<h1>Edit Item</h1>
    <form action="./forms/updateItem.php"  method="post" enctype="multipart/form-data">
        <label for="item">Food Item</label>
        <input type="text" name="item" id="item" value=<?php echo $row["name"] ?> placeholder="Enter food item">
        <br>
        <label for="item">Picture</label>
        <input type="file" name="item" id="item" placeholder="Enter food item">
        <br>
        <label for="price"> Price</label>
        <input type="number" name="price" value=<?php echo $row["price"] ?> id="price">
        <br> <br>
        <button class="orange-btn" type="submit">Update</button>
    </form>
</body>
</html>