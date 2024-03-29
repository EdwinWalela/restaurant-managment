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
		$sql = "SELECT menu.name,cart.quantity,menu.price,cart.item_id FROM cart INNER JOIN menu ON item_id = menu.id AND user_id =".$user;
		return $conn->query($sql);
		
	}

	function displayOrder($orderId){
		$conn = connect();
		$sql = "SELECT menu.name,menu.price,order_details.description,order_details.quantity,order_details.order_id,order_details.status FROM order_details INNER JOIN menu ON item_id = menu.id AND order_id=".$orderId;
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
	
	function newOrderDetail($orderId,$itemId,$unitAmount,$description,$quantity){
		$conn = connect();
		$sql = "INSERT INTO order_details (id,order_id,item_id,unit_amount,description,quantity,date_created,status) VALUES(DEFAULT,".$orderId.",".$itemId.",".$unitAmount.",'".$description."',".$quantity.",DEFAULT,0)";

		$conn->query($sql);
	}

	function getOrders($id){
		$conn = connect();
		if($id == 0){
			//pending
			$sql = "SELECT * FROM orders WHERE status = 0";
		}else if($id == 1){
			//in progress
			$sql = "SELECT * FROM orders WHERE status = 1";
		}else if($id == 2){
			//completed
			$sql = "SELECT * FROM orders WHERE status = 2";
		}else{
			$sql = "SELECT * FROM orders";
		}
		return $conn->query($sql);
	}

	function getOrder($id){
		$conn = connect();
		$sql = "SELECT * FROM orders WHERE orderId=".$id;
		return $conn->query($sql);
	}

	function updateOrderStatus($to,$id){
		$conn = connect();
		if($to == 10){
			// delete
			$sql = "DELETE FROM order_details WHERE order_id=".$id;
			$conn->query($sql);
			$sql = "DELETE FROM orders WHERE orderId=".$id;
			$conn->query($sql);
		}else{
			$sql = "UPDATE orders SET status = ".$to." WHERE orderId=".$id;
			$conn->query($sql);
			$sql = "UPDATE order_details SET status = ".$to." WHERE order_id=".$id;
			$conn->query($sql);
		}
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