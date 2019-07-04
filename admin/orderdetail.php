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
        <h3>Items</h3>
            <?php
                while($row = $result->fetch_assoc()){
            ?>
                <p><?php echo $row["name"]?> : <?php echo $row["quantity"]?> X <?php echo $row["price"]?></p>
            <?php
			}
				if($row["status"] == 0){
			?>
				<a href="updateorder.php?to=1"><button>Prepare</button></a>
				<a href="updateorder.php?to=10"><button>Cancel</button></a>			
			<?php
			}else{
			?>
				<a href="updateorder.php?to=3"><button>Complete</button></a>
			<?php
			}
			?>
    </div>
</body>
</html>