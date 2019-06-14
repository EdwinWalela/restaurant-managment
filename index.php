
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <title>Ed's Eatery</title>
    <?php
        require "./config/dbconfig.php";
        $result = getMenu();
    ?>
</head>

<body>
    <a href="login.php"><button id="admin">Login</button></a>
    <h1>Our Menu</h1>
        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='menu-card'>";
                echo "<img src='./".$row["pic"]."'/>";
                echo "<p>".$row["name"]."</p>";
                echo "<h3>Ksh. ".$row["price"]."</h3>";
                echo "</div>";
            }
        ?>

    <i class="fas fa-angle-double-down"></i>

    <h1>Order Now </h1>
    
    <form action="result.php"  method="post">
        <label for="item">Food Item</label>
        <select name="item" id="item">
        <?php
            $result = getMenu();
            // output data of each row
            while($row = $result->fetch_assoc()) {
                print_r($row);
                echo "<option value='" .$row['name']. "'>".$row["name"]."</option>";
            }
        ?>
        </select>
        <br>
        <label for="quantity"> Quantity</label>
        <input type="number" name="quantity" id="quantity" value=1>
        <br> <br>
        <button class="orange-btn" type="submit">Order Now</button>
    </form>
</body>
</html>