<?php 
	// error_reporting(0);
	session_start();
	require_once "config.php";
	$total = 0;

	$sql = "SELECT * FROM  ecommars ORDER BY id ASC";
	$result = mysqli_query($conn, $sql);
	// $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	 $products = [];
    while($product = mysqli_fetch_assoc($result)){
        $products[] = $product;
    }


	if (isset($_POST["Add_to_cart"])){

		if (isset($_SESSION["Shopping_cart"])){
			$item_array_id = array_column($_SESSION["Shopping_cart"], "item_id");

			if (!in_array($_GET["id"], $item_array_id)){

				$count			= count($_SESSION["Shopping_cart"]);
				$item_array		= array(
					'item_id'		=> $_GET["id"],
					'item_name'		=> $_POST["hidden_name"],
					'item_price'	=> $_POST["hidden_price"],
					'item_quantity'	=> $_POST["quantity"]
				);
				
				$_SESSION["Shopping_cart"] [$count] = $item_array;
			}else{
				header('Location: index.php');
			}
		}else{
			$item_array = array(
				'item_id'		=> $_GET["id"],
				'item_name'		=> $_POST["hidden_name"],
				'item_price'	=> $_POST["hidden_price"],
				'item_quantity'	=> $_POST["quantity"]
			);
			$_SESSION["Shopping_cart"][0] = $item_array;
		}
	}

 ?>


<?php 
	require_once "header.php";
 ?>

	<div class="container">
		<div class="row">
			<?php foreach ($products as $product): ?>	
				<div class="col-md-4">
					<form method="POST" action="index.php?action=add&id=<?php echo $product['id']; ?>">
						<div style="text-align: center; border:1px #000 solid; border-radius: 5px;">
							<img src="<?php echo $product['product_img']; ?>" alt="PRODUCT1" class="img-fluid">
							<h3><?php echo $product['product_name']; ?></h3>
							<h4><?php echo $product['price']; ?>$</h4>
							<input type="number" name="quantity" value="1" class="form-control">
							<input type="hidden" name="hidden_name" value="<?php echo $product["product_name"]  ?>">
							<input type="hidden" name="hidden_price" value=" <?php echo $product['price'] ?> ">
							<input type="submit" name="Add_to_cart" value="Add To Cart" class="btn btn-success my-3 center">
						</div>
					</form>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="row text-center d-block">
			<div class="my-5">
				<a href="viewCart.php" class="btn btn-info col-lg-6">View Your Product List</a>
			</div>
		</div>

	</div>

	<?php require_once "footer.php"?>