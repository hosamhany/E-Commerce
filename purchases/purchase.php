<?php
	session_start();
?>
	<div id="cart">
<?php
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
	$userid = $_SESSION['userid'];
	echo $product_id = $_GET['product_id'];

	echo $checkQuery = "SELECT * FROM cart WHERE buyer_id = $userid AND product_id = $product_id";
	$product_ids = mysqli_query($conn, $checkQuery);
	if(!$product_ids) {
		echo '<h3>Oops something went wrong</h3>';
	}
	else {
		$cart = mysqli_fetch_all($product_ids);
		if(count($cart) > 0) {
			echo $deleteQuery = "DELETE FROM cart WHERE buyer_id =".$userid." AND product_id = ".$product_id;
			mysqli_query($conn, $deleteQuery);
		}
		echo $insertQuery = "INSERT INTO bought (buyer_id, product_id) VALUES (".$userid.",".$product_id.")";
		mysqli_query($conn, $insertQuery);
	}
?>