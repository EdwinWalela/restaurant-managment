<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="./static/style.css">
</head>
<?php 
	require "./config/dbconfig.php";
	$result = getUserTypes();
?>

<body>
	<form action="./forms/registerUser.php" method="POST">
		<p>Already Have an account?
		<a href="login.php"><span id='new-acc-tip'> Login</a></span></p>
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname">
		<br/>
		<label for="lname">Last Name</label>
		<input type="text" name="lname" id="lname">
		<br/>
		<label for="pass">Password</label>
		<input type="password" name="pass" id="pass">
		<br/>
		<label for="type">User Type</label>
		<select name="type" id="type">
		<?php
			while($row = $result->fetch_assoc()) {
				print_r($row);
				echo "<option value='" .$row['userId']. "'>".$row["userType"]."</option>";
			}
		?>
		</select><br/>
		<button class="orange-btn" type="submit">Register</button>
    </form>
</body>
</html>