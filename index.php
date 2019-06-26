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
		require "./models/menu.php";
		$result = getMenu();
	?>
</head>

<body>
	<?php include './include/nav.php';?>
	<h1>The Menu</h1>
	<!-- Display Menu -->
		<?php
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<div class='menu-card'>";
				echo "<img src='./images/".$row["pic"]."'/>";
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
		<form action="cart.php"  method="post">
			<label for="item">Food Item</label>
			<select name="item" id="item">
			<?php
				$result = getMenu();
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<option value='" .$row['id']. "'>".$row["name"]."</option>";
				}
			?>
			</select>
			<br>
			<label for="quantity"> Quantity</label>
			<input type="number" name="quantity" id="quantity" value=1>
			<br><br>
			<p style="text-decoration:underline">Size</p>
			<select name="order-desc" id="order-desc">
				<option value="large">Large</option>
				<option value="medium">Medium</option>
			</select>
			<br><br>
			<button class="orange-btn" type="submit">Add To Cart</button>
		</form>
		<!-- Display Menu -->
		<?php
		   
			$result = displayCart($_SESSION["userId"]);
			if($result->num_rows){
				echo "<h1 id='mycart'>My Cart</h1>";
				while($row = $result->fetch_assoc()) {
					echo "<br>";
					echo "<div class='mycart'>";
					echo "<p>".$row["name"]."(x".$row["quantity"].")</p>";
					echo "<h3>Ksh. ".$row["price"]*$row["quantity"]."</h3>";
					echo "</div>";
					echo "<br>";
				}
				echo "<br><br>";
			echo "<a href='result.php'><button class='white-btn'>Checkout</button></a>";
			}else{
			?>
				<h1>Cart Empty</h1>
			<?php
			}
		   
		?>
		<br>
		 
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