<?php
	function connect(){
		$servername = "localhost";
		$username = "root";
		$pass = "";
		$db = "pizza";
		return new mysqli($servername,$username,$pass,$db);
	}

	function getMenu(){
		$conn = connect();
		$sql = "SELECT * FROM menu";
        return $conn->query($sql);	
	}

	function getUser($id){
		$conn = connect();
		$sql = "SELECT * FROM users WHERE id = ".$id;
		$conn->query($sql);
	}

	function newFoodItem($filename,$item,$price,$tempName){
		$conn = connect();
		$target = "./images/";
		$pic = $target.$filename;
		$sql = "INSERT INTO menu (name,price,pic) values('".$item."',".$price.",'".$pic."')";
		$result = $conn->query($sql);
		move_uploaded_file($tempName,$pic);
	}

	function getFoodItem($item){
		$conn = connect();
		$sql = "SELECT * FROM menu WHERE name='".$item."'";
        return $conn->query($sql);
	} 

	function updateFoodItem($filename,$item,$price,$tempName){
		$conn = connect();
		$target = "./images/";
		$pic = $target.$filename;
		if(isset($filename)){
			move_uploaded_file($tempName,$pic);
			$sql = "UPDATE menu SET name='".$item."',price=".$price.",pic='".$pic."' WHERE name='".$item."'";
		}else{
			$sql = "UPDATE menu SET name='".$item."',price=".$price." WHERE name='".$item."'";
		}
		$result = $conn->query($sql);
	}

	function registerUser($fname,$lname,$pass,$type){
		$conn = connect();
		$pass = sha1($pass);
		$sql = "INSERT INTO users (id,fname,lname,pass,userId) values(DEFAULT,'".$fname."','".$lname."','".$pass."',".$type.") ";
		$conn->query($sql);
	}

	function getUserTypes(){
		$conn = connect();
		$sql = "SELECT * FROM userTypes";
		return $conn->query($sql);
	}
	
	function login($username,$pass){
		$conn = connect();
		$sql = "SELECT * FROM users WHERE fname='".$username."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	function getUsers(){
		$conn = connect();
		$sql = "SELECT * FROM users";
        return $conn->query($sql);	
	}
 ?>