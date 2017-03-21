<?php
	session_start();
	require("sql_connect.php");
	
	$building_id = $_POST["building_id"];
	$unit_cost = $_POST["unit_cost"];
	$floor = $_POST["floor"];
	$area_size = $_POST["area_size"];
	$rental_type = $_POST["rental_type"];
	
	$query = "INSERT INTO rental_spaces (building_id, unit_cost, floor, area_size, rental_type) VALUES ((SELECT building_id FROM buildings WHERE building_name = '{$building_id}'), '{$unit_cost}', '{$floor}', '{$area_size}', '{$rental_type}')";
	
	$insert = mysqli_query($conn, $query);
	
	if($insert){
		echo "<script>alert('Building Successfully Added!');
					  window.location.href='admin.php';</script>";
	}else{
		echo "<script>alert('Something went wrong, please try again.'".mysqli_error($conn).");
					  window.location.href='admin.php';</script>";
	}
?>