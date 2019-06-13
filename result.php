
<!DOCTYPE html>
<html>
<head>
<style>
	*{
		font-family:sans-serif;
	}
		h1{
			margin-top:1em;
			color:#fff;
			text-align:center;
		}
		#total{
			background:#fff;
			width:25%;
			min-width:100px;    
			font-size:1.3em;
			margin:1em auto;
			color:#000;
			padding:15px;
		}
		body{
			padding:50px 10px;
			text-align:center;
			background:tomato;
		}
		select{
			font-size:1.2em;
			padding:10px;
			margin:30px 0;
			width:200px;
		}
		input{
			font-size:1.2em;
			padding:10px;
			margin:30px 0;
			width:100px;
		}
		label{
			width:100px;
			font-size:1.2em;
			color:#fff;
			margin:10px 30px;
		}
		button{
			margin-top:20px;
			width:200px;
			padding:10px;
			border:none;
		}
		img{
			width:200px;
			height:200px;
			margin:20px;
			transition:all linear .4s;
		}
		img:hover{
			transition:all linear .4s;
			transform:scale(1.1);
			
		}
	</style>
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
				echo "<img src='".$pics[$_POST["item"]]."'/>";
			}
			
			echo "<p id='total'>( ".$quantity." x Ksh.".$prices[$_POST["item"]]." )<br><br>Total Ksh. ".$total."</p>";
		}
	?>
		<br>  
		<a href="./menu.php"><button>New Order</button></a> 
</body>
</html>