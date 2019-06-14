<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <?php
      require "./config/dbconfig.php";
      $result = getMenu();
    ?>
    <style>
        *{
            cursor:pointer;
        }
       #admin{
            margin-top:20px;
            margin-left:85%;
            width:150px;
            padding:10px;
            font-size:1.1em;
            border:none;
            color:#fff;
            background:tomato;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 400px;
            margin:auto;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        img{
            height:80px;
            width:80px;
        }
    </style>
</head>
<body>
<a href="menu.php"><button id="admin">Menu</button></a>
<a href="fooditem.php"><button id="admin">New Food Item</button></a>
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
                echo "<td> <img src='" .$row['pic']."'/>";
                echo "<td><a href='food.php?food=".$row['name']."'> Edit </a></td>";
                echo "<td> Delete </td>";
                echo "</tr>";
            }
        ?>
        </tr>

    </table>
</body>
</html>