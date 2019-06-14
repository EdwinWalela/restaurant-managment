
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./static/style.css">
	<title>Pizza Menu</title>
</head>
<body>
	<?php
		require "./config/dbconfig.php";
		
		$result = getMenu();

		$prices = array();
		$pics = array();

		while($row = $result->fetch_assoc()) {
			$prices[$row["name"]] = $row["price"];
			$pics[$row["name"]] = $row["pic"];
		}

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$quantity = $_POST["quantity"];
			$total = $prices[$_POST["item"]] * $quantity;


		for($i = 0; $i < $quantity; $i++){
			echo "<img class='res-pics' src='".$pics[$_POST["item"]]."'/>";
		}
			
			echo "<p id='total'>( ".$quantity." x Ksh.".$prices[$_POST["item"]]." )<br><br>Total Ksh. ".$total."</p>";
		}
	?>
		<br>  
		<a href="./index.php"><button class='white-btn-static'>New Order</button></a> 
</body>
</html>