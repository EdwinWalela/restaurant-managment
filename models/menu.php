<?php
    require "./config/dbconfig.php";
 
    function newFoodItem($filename,$item,$price,$tempName){
        $conn = connect();
        $target = "../images/";
		$pic = $target.$filename.".png";
		$sql = "INSERT INTO menu (name,price,pic) values('".$item."',".$price.",'".$pic."')";
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
?>