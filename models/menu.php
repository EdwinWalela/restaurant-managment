<?php
	if(file_exists("./config/dbconfig.php")){
		require "./config/dbconfig.php";
	}else{
		require "../config/dbconfig.php";
	}
    function newFoodItem($filename,$item,$price,$tempName){
        $conn = connect();
        $target = "../images/";
		$pic = $target.$filename.".png";
		$file = $filename.".png";
		$sql = "INSERT INTO menu (name,price,pic) values('".$item."',".$price.",'".$file."')";
		$result = $conn->query($sql);
		move_uploaded_file($tempName,$pic);
    }
    
    function getMenu(){
		$conn = connect();
		$sql = "SELECT * FROM menu";
        return $conn->query($sql);	
    }
    
	function getFoodItem($item){
		$conn = connect();
		$sql = "SELECT * FROM menu WHERE name='".$item."'";
        return $conn->query($sql);
    } 
    
	function updateFoodItem($id,$filename,$item,$price,$tempName){
		$conn = connect();
		$target = "../images/";
		if(isset($filename)){
			$file = $filename.".png";
			$pic = $target.$filename.".png";
			move_uploaded_file($tempName,$pic);
			$sql = "UPDATE menu SET name='".$item."',price=".$price.",pic='".$file."' WHERE id='".$id."'";
		}else{
			$sql = "UPDATE menu SET name='".$item."',price=".$price." WHERE id='".$id."'";
		}
		$conn->query($sql);
		echo $sql;
	}
?>