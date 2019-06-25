<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./static/style.css">
	<title>Pizza Menu</title>
</head>
<body>
	<?php include './include/nav.php';?>
	<?php
		require "./config/dbconfig.php";
		
		$result = displayCart($_SESSION["userId"]);
		$total = 0;
		
		while($row = $result->fetch_assoc()) {
			$total+=$row["price"] * $row["quantity"];
		}
		
		$orderId = newOrder($_SESSION["userId"],$total);
		$result = displayCart($_SESSION["userId"]);
		
		while($row = $result->fetch_assoc()) {
			newOrderDetail($orderId,$row["price"],"desc",$row["quantity"]);
			echo "<br>";
			echo "<div class='mycart'>";
			echo "<p>".$row["name"]."(x".$row["quantity"].")</p>";
			echo "<h3>Ksh. ".$row["price"]*$row["quantity"]."</h3>";
			echo "</div>";
			echo "<br>";
		}
		emptyCart($_SESSION["userId"]);
	?>
		<br>  
		<a href="./index.php"><button class='white-btn-static'>New Order</button></a> 
</body>
</html>