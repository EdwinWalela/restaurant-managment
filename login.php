<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="./static/style.css">
	<?php
		$queries = array();
		parse_str($_SERVER["QUERY_STRING"],$queries);
		function success(){
			echo "<p class='msg msg-success'>Account creation was successful. Please Login to proceed</p>";
		}
		function mismatch(){
			echo "<p class='msg msg-fail'>Incorrect Credentials. Please Try Again</p>";
		}
		function notfound(){
			echo "<p class='msg msg-fail'>Account not Found. Please Create an Account First</p>";
		}
		function accFail(){
			echo "<p class='msg msg-fail'>Oops. Please try again</p>";
		}
	?>
</head>

<body>
	<?php
		if(sizeof($queries) !=0 ){
			if($queries["status"] === "mismatch"){
				mismatch();	
			}else if($queries["status"] === "n/a"){
				notfound();
			}else if($queries["status"] === "ok"){
				success();
			}
		}
	?>
	<form action="./forms/login.php" method="POST">
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname" required>
		<br/>
		<label for="pass">Password</label>
		<input type="password" name="pass" id="pass" required>
		<br/>
		<button class="orange-btn" type="submit">Login</button>
		<a href="register.php"><p id='new-acc-tip'>Create Account</p></a>
    </form>
</body>
</html>