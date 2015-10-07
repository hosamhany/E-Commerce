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
	echo $checkQuery = "SELECT * FROM cart, products WHERE cart.product_id = products.id AND cart.buyer_id = $userid;";
	$products = mysqli_query($conn, $checkQuery);
	echo '<br>'.print_r($products).'<br>';
	if(!$products) {
		echo '<h3>Oops something went wrong</h3>';
	}
	else {
		// $cart = mysqli_fetch_all($product_ids);
		while($product = mysqli_fetch_assoc($products)) {
			echo '<br>'.print_r($product).'<br>';
			$q = $product['quantity'];
			if ($q == 0)
				continue;
			$deleteQuery = "DELETE FROM cart WHERE buyer_id =".$userid." AND product_id = ".$product['product_id'];
			$insertQuery = "INSERT INTO bought (buyer_id, product_id) VALUES (".$userid.",".$product['product_id'].")";
			$q = $q - 1;
			echo 'update '.$updateQuery = "UPDATE products SET quantity=$q WHERE id=".$product['id'];
			mysqli_query($conn, $deleteQuery);
			mysqli_query($conn, $insertQuery);
			mysqli_query($conn, $updateQuery);
		}
	}
?>