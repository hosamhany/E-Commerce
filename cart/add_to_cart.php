<?php
		session_start();
		$server_name= "localhost";
		$user_name= "root";
		$password_name = "";
		$db_name= "ecommerce";
		$conn = mysqli_connect ($server_name, $user_name, $password_name, $db_name);
		if(!$conn)
		{
			die ('Connection error' .mysqli_connect_error());
		}

		if( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
		{
			header("Location: ../auth/Login.php");
		}
		if(!$_GET['product_id']) {
			die('404 Page not found');
		}
		$product_id = $_GET['product_id'];
		$userid = $_SESSION['userid'];
		$query = "INSERT INTO cart (product_id, buyer_id) VALUES (".$product_id.",".$userid.")";
		$response = mysqli_query($conn, $query);
		echo $response;
		// header("Location: /");
?>