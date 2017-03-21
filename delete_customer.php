<?php
    session_start();
	require("sql_connect.php");
    
    $customer_id = $_POST["customer_id"];
    
    $query = "DELETE FROM customers WHERE customer_id='{$customer_id}'";
    $query2 = "DELETE FROM customer_business WHERE customer_id='{$customer_id}'";
    $query3 = "DELETE FROM customer_individual WHERE customer_id='{$customer_id}'";
    
    $delete2 = mysqli_query($conn, $query2);
    $delete3 = mysqli_query($conn, $query3);
    $delete = mysqli_query($conn, $query);
    
    if($delete && $delete2 && $delete3){
        echo json_encode(1);
    }else{
        echo json_encode(0);
    }
?>