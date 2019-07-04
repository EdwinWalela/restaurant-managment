<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Order Status</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
	<link rel="stylesheet" href="../static/style.css">
	<?php
	  require "../models/menu.php";

      $queries = array();
      parse_str($_SERVER["QUERY_STRING"],$queries);

      if($_SERVER["REQUEST_METHOD"] == "GET" && $queries["id"]){
         $result = displayOrder($queries["id"]);
      }
  ?>
</head>
<body>
<?php include '../include/nav.php';?>
    <div class="order-description">
        <h3>Order</h3>
		<ul>
            <?php
                while($row = $result->fetch_assoc()){
					$orderId = $row["order_id"];
					$status = $row["status"];
					$total = getOrder($row["order_id"]);
					$total = $total->fetch_assoc();
					$total = $total["amount"];
            ?>
                <li><?php echo $row["name"]?> : <?php echo $row["quantity"]?> X <?php echo $row["price"]?></li>
            <?php
			}
			?>
		</ul>
		<br><br>
		<p>Total: Ksh.<?php echo $total?></p>
		<?php
			if($status == 0){
		?>
			<a href="updateorder.php?to=1&orderid=<?php echo $orderId;?>"><button class='prepare'>Prepare</button></a>
			<a href="updateorder.php?to=10&orderid=<?php echo $orderId;?>"><button class='cancel'>Cancel</button></a>			
		<?php
		}else if($status == 1){
		?>
			<a href="updateorder.php?to=2&orderid=<?php echo $orderId;?>"><button class='complete'>Complete</button></a>
			<a href="updateorder.php?to=10&orderid=<?php echo $orderId;?>"><button class='cancel'>Cancel</button></a>
		<?php
		}
		?>
    </div>
</body>
</html>