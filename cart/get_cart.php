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
	$query = "SELECT * FROM cart, products WHERE cart.buyer_id = $userid AND cart.product_id = products.id";
	$products = mysqli_query($conn, $query);
	if(!$products) {
		echo '<h3>Oops something went wrong</h3>';
	}
	else {
		echo '<h3> Your Cart</h3><hr>';
		echo '<ul>';
		while($item = mysqli_fetch_assoc($products)) {
		echo '<li>';
		echo '<h5>', $item['name'],'</h5>';
		?>
		<!-- <h5><small id="price-<?php echo $item['id'];?>">
			<script>
				var ppu = <?php echo $item['price']; ?>;
				var id = <?php echo $item['id']; ?>;
				var q = document.getElementById("quantity-<?php echo $item['id'] ?>").value;
				document.getElementById("price-<?php echo $item['id']; ?>").innerHTML = ppu*q;
			</script>
		</small></h5> -->
		<?php
		echo '<button class="btn btn-danger" data-toggle="modal" 
			data-target="#delete_item" id="delete" value="delete" 
			onclick="confirmDelete('.$p_id.')">Delete</button>';
		echo '</li>';
		}
		echo '</ul><hr>';
		?>
		<button class="btn btn-primary" data-toggle="modal" 
			data-target="#checkout" id="checkout-button" value="checkout">Checkout</button>
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
					echo '<ul>';
					$total = 0;
					foreach($products as $item) {
						// echo 'inside the loop';
						// print_r ($item);
						echo '<li>';
						$total += $item['price'];
						echo '<strong>'.$item['name'].'</strong>   <small>$'.$item['price'].'</small>';
						?>
						<!-- <p id="quantity-<?php echo $item['id']; ?>"></p> -->
						<script>
							// var quantity = document.getElementById("quantity-<?php echo $item['id'] ?>").value;
							// var max = <?php echo $item['quantity']; ?>;
							// quantity = (quantity > max)? max : quantity;
							// pricePerUnit = <?php echo $item['price']; ?>;
							// var id = <?php echo $item['id']; ?>;
							// var totalPrice = quantity * pricePerUnit;
							// document.getElementById("quantity-<?php echo $item['id'] ?>").innerHTML = "$"+totalPrice;
						</script>
						</li>
						<?php
					}
					echo '</ul>';	
					?>
					</p>
					<hr>
					<button class="btn btn-success" 
					onclick="checkout()">Purchase</button> <p>Total: $<?php echo $total; ?></p>
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	function getItemPrice(p_id) {
	}
</script>