<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="./static/style.css">
</head>

<body>
	<form action="./forms/login.php" method="POST">
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname">
		<br/>
		<label for="pass">Password</label>
		<input type="password" name="pass" id="pass">
		<br/>
		<button class="orange-btn" type="submit">Login</button>
    </form>
</body>
</html>