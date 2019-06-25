<?php
	require "../config/dbconfig.php";
	
    function login($username,$pass){
			$conn = connect();
			$sql = "SELECT * FROM users WHERE fname='".$username."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			return $row;
    }
    
    function registerUser($fname,$lname,$pass,$type){
			$conn = connect();
			$pass = sha1($pass);
			$sql = "INSERT INTO users (id,fname,lname,pass,userId) values(DEFAULT,'".$fname."','".$lname."','".$pass."',".$type.") ";
			$conn->query($sql);
		}
?>
