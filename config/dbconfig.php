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
		$target = "../images/";
		$pic = $target.$filename.".png";
		$sql = "INSERT INTO menu (name,price,pic) values('".$item."',".$price.",'".$pic."')";
		$result = $conn->query($sql);
		move_uploaded_file($tempName,$pic);
	}

	function addToCart($user,$item,$quantity){
		$conn = connect();
		$sql = "INSERT INTO cart (cart_id,user_id,item_id,quantity) VALUES(default,".$user.",".$item.",".$quantity.")";
		$conn->query($sql);
	}

	function displayCart($user){
		$conn = connect();
		$sql = "SELECT menu.name,cart.quantity,menu.price FROM cart INNER JOIN menu ON item_id = menu.id";
		return $conn->query($sql);
		
	}

	function newOrder($user,$amount){
		$conn = connect();
		$sql = "INSERT INTO orders (orderId,userId,amount,status,date_created) VALUES(DEFAULT,".$user.",".$amount.",0,DEFAULT)";
		$conn->query($sql);
		$orderId = $conn->insert_id;
		return $orderId;
	}

	function emptyCart($user){
		$conn = connect();
		$sql = "DELETE FROM cart WHERE user_id=".$user;
		$conn->query($sql);
		$orderId = $conn->insert_id;
		return $orderId;
	}
	
	function newOrderDetail($orderId,$unitAmount,$description,$quantity){
		$conn = connect();
		$sql = "INSERT INTO order_details (id,order_id,unit_amount,description,quantity,date_created,status) VALUES(DEFAULT,".$orderId.",".$unitAmount.",'".$description."',".$quantity.",DEFAULT,0)";

		$conn->query($sql);
	}

	function getOrders(){
		$conn = connect();
		$sql = "SELECT * FROM orders";
		return $conn->query($sql);
	}

	function getOrdersTotal(){
		$conn = connect();
		$sql = 'SELECT SUM(total) AS sum FROM orders';
		return $conn->query($sql);
	}

	function getFoodItem($item){
		$conn = connect();
		$sql = "SELECT * FROM menu WHERE name='".$item."'";
        return $conn->query($sql);
	} 

	function updateFoodItem($filename,$item,$price,$tempName){
		$conn = connect();
		$target = "./images/";
		if(isset($filename)){
			$pic = $target.$filename.".png";
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