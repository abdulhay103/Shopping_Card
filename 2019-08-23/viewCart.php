
<?php 
	session_start();
	if(isset($_SESSION['u_email'])) {
		$_SESSION['loggedIn'] = true;
	} else {
		header('Location: login.php');
	}
?>


<?php require_once "header.php"; ?>

	<div class="container">
		<h2 class="text-center text-warning mb-3">Order Details</h2>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="25%">Item Name</th>
					<th width="10%">Quantity</th>
					<th width="15%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
					
				</tr>

				<?php 

					$total = 0;

					if (!empty($_SESSION["Shopping_cart"])){

					 	foreach ($_SESSION["Shopping_cart"] as $value){

					 		$single_total = intval($value['item_quantity']) * intval($value['item_price']);
						?>
						<tr>
							<td> <?php echo $value["item_name"]; ?></td>
							<td> <?php echo $value["item_quantity"]; ?></td>
							<td> <?php echo $value["item_price"]; ?></td>
							<td><?php echo $single_total ; ?></td>
							<td><a href="viewCart.php?action=delete&id=<?php echo $value["item_id"];?>"> <span class="btn btn-danger">Remove</span></a></td>
						</tr>

						<?php 
							//remove item in cart

							if (isset($_GET["action"])){

								if ($_GET["action"] == "delete"){

									foreach ($_SESSION["Shopping_cart"] as $keys => $value){

										if ($value["item_id"] == $_GET["id"]){
											// remove id
											unset($_SESSION["Shopping_cart"] [$keys]);
											header('Location: viewCart.php');
										}
									}
								}
							}

						 ?>

						<?php 
							//Total amount calculet
							$total += intval($value['item_quantity']) * intval($value['item_price']);
							 	}
					}elseif (empty($_SESSION["Shopping_cart"]) && $_SESSION['loggedIn']) {
						echo "<script>alert('Your Cart Is Empty!')</Script>";
					}

					 	?>

					 	<tr>
						 	<td colspan="3" align="right">Total</td>
						 	<td> <?php echo $total; ?> </td>
					 	</tr>
			</table>
		</div>
		<div class="row text-center d-block">
			<div class="mt-5">
				<a href="index.php" class="btn btn-info col-lg-4">Continue Shopping</a>
				<a href="<?php if(!isset($_SESSION['u_email'])){
					echo "signup.php";
				} else {
					echo "endpage.php?login=seccess";
				}
					?>" class="btn btn-success col-lg-4">Order Now</a>
				
			</div>
		</div>
	</div>

	<?php require_once 'footer.php'; ?>