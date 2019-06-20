<?php 
echo '<nav id="menu">';
echo ' <a href="index.php"> <h1>Ed\'s Eatery</h1> </a>';
if(isset($_SESSION["type"])){
    if($_SESSION["type"] == 1){
        echo '<a href="newItem.php"><p>Add Item</p></a>';
        echo '<a href="dashboard.php"><p>Manage Items</p></a>';
        echo '<a href="users.php"><p>Manager Users</p></a>';
        echo '<a href="report.php"><p>Financial Report</p></a>';
    }
}
if(isset($_SESSION["auth"])){
   echo '<a href="logout.php"><p>Logout <span>('.$_SESSION["user"].')</span>    </p></a>';
}else{
     echo '<a href="login.php"><p>Login</p></a>';
}

echo '</nav>';