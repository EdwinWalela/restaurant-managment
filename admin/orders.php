<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Orders </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
	<link rel="stylesheet" href="../static/style.css">
	<?php
		require "../models/menu.php";
		$queries = array();
		parse_str($_SERVER["QUERY_STRING"],$queries);

		if(sizeof($queries) !=0 ){
			if($queries["status"] == "pending"){
				$result = getOrders(0);
			}else if($queries["status"] == "in-progress"){
				$result = getOrders(1);
			}else if($queries["status"] == "completed"){
				$result = getOrders(2);
			}else{
				$result = getOrders(3);
			}
		}else{
			$result = getOrders(3);
		}
	?>
</head>
<body>
<?php include '../include/nav.php';?>
	<select name="" id="order-filter">
		<option value="">Filter Orders</option>
		<option value="all">All Orders</option>
		<option value="pending">Pending</option>
		<option value="in-progress">In Progress</option>
		<option value="completed">Completed</option>
	</select> <br>
	<?php
		if($result->num_rows == 0){
			?>
			
			<i class="fas fa-heart-broken"></i>
			<p>No Orders Available</p>
			<?php
		}
		while($row = $result->fetch_assoc()){
			?>
			<a href="orderdetail.php?id=<?php echo $row["orderId"] ?>">
				<div class="order-detail">
					<?php
						date_default_timezone_set("AFRICA/NAIROBI"); 
						
						$date = new DateTime($row["date_created"]);
						$now = new DateTime();
						$duration = $date->diff($now)->format(" %i");
					?>
					<p class='order-time'><?php echo $duration?> minutes ago</p>
					<h2>#<?php echo $row["orderId"] ?></h2> 
					<?php if($row["status"] == 0){?>
						<p class='order-status pending'>Pending <i class="fas fa-hourglass-half"></i></p>
					<?php }else if($row["status"] == 1){ ?>
						<p class='order-status pending'>Preparing <i class="fas fa-spinner"></i></p>
					<?php }else{?>
						<p class='order-status pending'>Ready <i class="fas fa-check"></i></p>
					<?php } ?>	
				</div>
			</a>
			<?php
		}
	?>
	<script src='../static/app.js'></script>
</body>
</html>