<?php
	session_start();
	require("sql_connect.php");
	
	if(strcasecmp($_POST["password"], $_POST["password2"]) == 0){
		$password = $_POST["password"];
	}else{
		echo "<script>alert('Please change your password');
					  window.location.href='setup.php';</script>";
	}
	$username = $_POST["username"];
	$lname = $_POST["lname"];
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
	$address = $_POST["address"];
	$contact = $_POST["contact_no"];
	
	$query= "UPDATE users SET username='{$username}', password='{$password}', lname='{$lname}', fname='{$fname}', mname='{$mname}', address='{$address}', contact_no='{$contact}' WHERE username='admin'";
	$update = mysqli_query($conn, $query);
	
	if($update){
		echo "<script>alert('Update Complete!');
					  window.location.href='admin.php';</script>";
	}else{
		echo "<script>alert('Something went wrong, please try again.');
					  window.location.href='setup.php';</script>";
	}
	
	
?>