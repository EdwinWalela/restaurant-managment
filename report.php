<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Financial Report</title>
    <link rel="stylesheet" href="./static/style.css">
    <?php
      require "./config/dbconfig.php";
      $result = getOrders();
    ?>
</head>
<body>
<?php include './include/nav.php';?>
    <table>
        <tr>
            <th>Item</th>
            <th>Amount (Ksh.)</th>
        </tr>
        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" .$row['item']."</td>";
                echo "<td>" .$row['total']."</td>";
                // echo "<td> <img class='table-pic' src='" .$row['pic']."'/>";
                // echo "<td><a href='edit.php?item=".$row['name']."'> Edit </a></td>";
                echo "</tr>";
            }
        ?>
        <tr>
            <td>Total</td>
            <?php
                $res = getOrdersTotal();
                $row = $res->fetch_assoc();
                echo "<td id='order-totals'>Ksh." .$row['sum']."</td>";
            ?>
        </tr>

    </table>
   
</body>
</html>