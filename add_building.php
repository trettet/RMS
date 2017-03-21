<?php
	session_start();
	require("sql_connect.php");
	
	$building_name = $_POST["building_name"];
	$address = $_POST["address"];
	$contact_no = $_POST["contact_no"];
	$desk_person = $_POST["desk_person"];
	
	$query = "INSERT INTO buildings (building_name, address, contact_no, desk_person_id) VALUES ('{$building_name}', '{$address}', '{$contact_no}', (SELECT desk_person_id FROM users WHERE username = '{$desk_person}'))";
	
	$insert = mysqli_query($conn, $query);
	
	if($insert){
		echo "<script>alert('Building Successfully Added!');
					  window.location.href='admin.php';</script>";
	}else{
		echo "<script>alert('Something went wrong, please try again.');
					  window.location.href='admin.php';</script>";
	}
?>