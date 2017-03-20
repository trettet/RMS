<?php
	session_start();
	require("sql_connect.php");
	
	$building_id = $_POST["building_id"];
	$unit_cost = $_POST["unit_cost"];
	$floor = $_POST["floor"];
	$area_size = $_POST["area_size"];
	$rental_type = $_POST["rental_type"];
	
	$query = "INSERT INTO buildings (building_id, unit_cost, floor, area_size, rental_type) VALUES ('{$building_id}', '{$unit_cost}', '{$floor}', '{$area_size}', '{$rental_type}')";
	
	$insert = mysqli_query($conn, $query);
	
	if($insert){
		echo "<script>alert('Building Successfully Added!');
					  window.location.href='admin.php';</script>";
	}else{
		echo "<script>alert('Something went wrong, please try again.');
					  window.location.href='admin.php';</script>";
	}
	
?>