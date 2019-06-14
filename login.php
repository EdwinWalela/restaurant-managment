<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="./static/style.css">
	<?php
		$queries = array();
		parse_str($_SERVER["QUERY_STRING"],$queries);
		function accCreation(){
			echo "<p class='msg msg-success'>Account creation was successful. Please Login to proceed</p>";
		}
		function accFail(){
			echo "<p class='msg msg-fail'>Oops. Please try again</p>";
		}
	?>
</head>

<body>
	<?php
		if($queries["creation"] === "success"){
			accCreation();	
		}else if($queries["creation"] === "fail"){
			accFail();
		}
	?>
	<form action="./forms/login.php" method="POST">
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname">
		<br/>
		<label for="pass">Password</label>
		<input type="password" name="pass" id="pass">
		<br/>
		<button class="orange-btn" type="submit">Login</button>
		<a href="register.php"><p id='new-acc-tip'>Create Account</p></a>
    </form>
</body>
</html>