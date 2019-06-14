<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
        *{
            font-family:sans-serif;
            cursor:pointer;
        }
            h1{
                margin-top:2em;
                color:#fff;
                text-align:center;
            }
            body{
                padding:50px 10px;
                text-align:center;
                background:tomato;
            }
            select{
                font-size:1.1em;
                padding:10px;
                margin:30px 0;
                width:200px;
            }
            form{
                border-radius:5px;
                box-shadow:0px 20px 10px rgba(0,0,0,0.3);
                padding:20px 10px;
                margin:20px auto 50px auto;
                max-width:400px;
                background:#fff;
            }
            input{
                font-size:1.2em;
                padding:10px;
                margin:30px 0;
                width:160px;
            }
    </style>
</head>

<body>
	<form action="./forms/login.php" method="POST">
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname">
		<br/>
		<label for="pass">Password</label>
		<input type="password" name="pass" id="pass">
		<br/>
		<button type="submit">Register</button>
    </form>
</body>
</html>