<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    
    <?php
      require_once "../models/users.php";
      $result = getUsers();
    ?>
</head>
<body>
    <?php include '../include/nav.php';?>
    <table>
        <tr>
            <th>Username</th>
            <th>Type</th>
        </tr>
        <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" .$row['fname']."</td>";
                if($row['userId'] == 1){
                    echo "<td><i class='fas user-icon admin-icon fa-user-shield'></i></td>";
                }else{
                    echo "<td><i class='fas user-icon fa-user'></i></td>";
                }
            }
        ?>
        </tr>

    </table>
    <h3>User Types</h3><br>
    <span>Admin: <i class='fas user-icon admin-icon fa-user-shield'></i>
    <br><br>
    Client: <i class='fas user-icon fa-user'></i> </span>
    <?php

    ?>
</body>
</html>