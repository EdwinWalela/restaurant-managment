<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./static/style.css">
    <?php
      require "./models/menu.php";
      $result = getMenu();
    ?>
</head>
<body>
<?php include './include/nav.php';?>
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
                echo "<td> <img class='table-pic' src='images/" .$row['pic']."'/>";
                echo "<td><a href='edit.php?item=".$row['name']."'> Edit </a></td>";
                echo "</tr>";
            }
        ?>
        </tr>

    </table>
</body>
</html>