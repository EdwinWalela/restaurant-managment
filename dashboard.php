<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./static/style.css">
    <?php
      require "./config/dbconfig.php";
      $result = getMenu();
    ?>
</head>
<body>
<a href="index.php"><button id="admin">Menu</button></a>
<a href="newItem.php"><button id="admin">New Food Item</button></a><br>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Pic</th>  
        </tr>
        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" .$row['name']."</td>";
                echo "<td>" .$row['price']."</td>";
                echo "<td> <img class='table-pic' src='" .$row['pic']."'/>";
                echo "<td><a href='food.php?food=".$row['name']."'> Edit </a></td>";
                echo "<td> Delete </td>";
                echo "</tr>";
            }
        ?>
        </tr>

    </table>
</body>
</html>