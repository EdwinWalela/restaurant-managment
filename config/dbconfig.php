<?php
	function connect(){
		$servername = "localhost";
		$username = "root";
		$pass = "";
		$db = "pizza";
		return new mysqli($servername,$username,$pass,$db);
	}

	function addToCart($user,$item,$quantity){
		$conn = connect();
		$sql = "INSERT INTO cart (cart_id,user_id,item_id,quantity) VALUES(default,".$user.",".$item.",".$quantity.")";
		$conn->query($sql);
	}

	function displayCart($user){
		$conn = connect();
		$sql = "SELECT menu.name,cart.quantity,menu.price FROM cart INNER JOIN menu ON item_id = menu.id AND user_id =".$user;
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

	function getUserTypes(){
		$conn = connect();
		$sql = "SELECT * FROM userTypes";
		return $conn->query($sql);
	}

 ?>