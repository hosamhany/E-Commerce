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
	$query = "SELECT product_id FROM cart WHERE buyer_id = $userid";
	$product_ids = mysqli_query($conn, $query);
	if(!$product_ids) {
		echo '<h3>Oops something went wrong</h3>';
	}
	else {
		echo '<h3> Your Cart</h3><hr>';
		echo '<ul>';
		while($p_id = mysqli_fetch_assoc($product_ids)) {
		echo '<li>';
		$p_id = $p_id['product_id'];
		$query = "SELECT * FROM products WHERE id = $p_id";
		$items = mysqli_query($conn, $query);
		if(!$items) {
		echo '<h4>Oops something went wrong</h4>';
		}
		else {
			$item = mysqli_fetch_assoc($items);
			echo '<h5><input type="number" value="1" STYLE="width: 50px" max="'.$item['quantity'].'"></input>', $item['name'],'<button class="btn btn-danger" data-toggle="modal" 
			data-target="#delete_item" id="delete" value="delete" 
			onclick="confirmDelete('.$p_id.')">Delete</button>';
			// echo '<small>', $item['quantity'], ' left</small></h5>';
			// echo '<p>', (strlen($item['details']) > 20)? 
			// substr($item['details'],0,20)."...<a href=\"../item.php?product_id=$p_id\">
			// More</a>" : $item['details'],'</p>';
		}
		echo '</li>';
		}
		echo '</ul><hr>';
		?>
		<button class="btn btn-primary" data-toggle="modal" 
			data-target="#checkout" id="checkout-button" value="checkout" 
			onclick="confirmCheckout('<?php $p_id ?>')">Checkout</button>
		<?php
	}
?>
<div class="modal fade bs-modal-sm" id="delete_item" role="dialog" 
	aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<h5>Remove this item from your cart?</h5>
					<hr>
					<p id="remove_item">Are you sure you want to delete <?php
						// echo $_GET['product_id'];
						$prods = mysqli_fetch_all($items);
						foreach($item as $prods) {
							// echo 'inside the loop';
							// print_r ($item);
							if($_GET['product_id'] == $item['id']) {
								break;
							}
						}
						echo '<strong>'.$item['name'].'</strong>';
						echo '<p>$'.$item['price'].'</p>';
					?>
					</p>
					<button class="btn btn-danger" 
					onclick="deleteItem('<?php echo $item['id']; ?>')">Yes</button>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="modal fade bs-modal-sm" id="checkout" role="dialog" 
	aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<h5>Checkout</h5>
					<hr>
					<p id="checkout-items"><?php
						// echo $_GET['product_id'];
						$prods = mysqli_fetch_all($items);
						foreach($item as $prods) {
							// echo 'inside the loop';
							// print_r ($item);
							if($_GET['product_id'] == $item['id']) {
								break;
							}
						}
						echo '<strong>'.$item['name'].'</strong>';
						echo '<p>$'.$item['price'].'</p>';
					?>
					</p>
					<button class="btn btn-danger" 
					onclick="deleteItem('<?php echo $item['id']; ?>')">Yes</button>
				</div>
			</div>
		</div>
	</div>

</div>