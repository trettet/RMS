<?php
	session_start();
	require("sql_connect.php");
    require("utils/salt_generator.php");
	
	if(strcasecmp($_POST["password"], $_POST["password2"]) == 0){
		$password = hash('sha256', $_POST['password']);
        $password = hash('sha256', $password . $salt);
	}else{
		echo "<script>alert('Password does not match!');
					  window.location.href='admin.php';</script>";
	}
	
	$username = $_POST["username"];
	$lname = $_POST["lname"];
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
	$address = $_POST["address"];
	$contact = $_POST["contact_no"];
	
	$query = "INSERT INTO users (username, password, lname, fname, mname, address, contact_no) VALUES ('{$username}', '{$password}', '{$lname}', '{$fname}', '{$mname}', '{$address}', '{$contact}')";
	$insert = mysqli_query($conn, $query);
	
	if($insert){
		echo "<script>alert('Desk Person Successfully Added!');
					  window.location.href='admin.php';</script>";
	}else{
		echo "<script>alert('Something went wrong, please try again.');
					  window.location.href='admin.php';</script>";
	}
?>