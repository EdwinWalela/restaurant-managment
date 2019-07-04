<?php
    if(file_exists("./config/dbconfig.php")){
		require "./config/dbconfig.php";
	}else{
		require "../config/dbconfig.php";
	}

    // Retrieve user using userId
    function getUser($id){
		$conn = connect();
		$sql = "SELECT * FROM users WHERE id = ".$id;
        return $conn->query($sql); 
    }
    // Retrieve all users
    function getUsers(){
		$conn = connect();
		$sql = "SELECT * FROM users";
        return $conn->query($sql);	
	}

?>