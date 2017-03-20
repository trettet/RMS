<?php
	$conn = mysqli_connect("localhost", "root", "", "RMSDB");
	
	if (!$conn) {
		echo "Error: Unable to connect to MySQL. <br>";
		echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
		echo "Debugging error: " . mysqli_connect_error();
		exit;
	}
?>