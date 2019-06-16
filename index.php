<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" href="./static/style.css">
    <title>Ed's Eatery</title>
    <?php
        require "./config/dbconfig.php";
        $result = getMenu();
    ?>
</head>

<body>
<nav id="menu">
    <h1>Ed's Eatery</h1>
   
    <!-- Display Logout button only when user is logged in -->
    <?php
        if(isset($_SESSION["auth"])){
    ?>
    <a href="logout.php"><p>Logout</p></a>
    <?php
        }else{
    ?>
     <a href="login.php"><p>Login</p></a>
    <?php
        }
    ?>
</nav>
    <h1>The Menu</h1>
    <!-- Display Menu -->
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
    <!-- Display Order Form only if the user is logged in -->
    <?php
        if(isset($_SESSION["auth"])){
    ?>
         <h1>Order Now </h1>
        <form action="result.php"  method="post">
            <label for="item">Food Item</label>
            <select name="item" id="item">
            <?php
                $result = getMenu();
                // output data of each row
                while($row = $result->fetch_assoc()) {
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
    <?php
        }else{
    ?>
    <h1>Login To Order</h1>
    <br>
    <a href="login.php"><button class= "white-btn">Login</button></a>
    <?php 
        }
    ?>
</body>
</html>