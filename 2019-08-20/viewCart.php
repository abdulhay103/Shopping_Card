 
<?php 

	session_start();
	session_destroy();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart || Php</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 class="text-center text-info mt-3">eSoft Online Shopping Zone</h1>
		<div class="row text-right d-block">
			<div class="mb-5">
				<a href="index.php" class="btn btn-warning">Home</a>
				<a href="viewCart.php" class="btn btn-warning">Cart</a>
			</div>
		</div>
		<h2 class="text-success text-center">Your Cart Products</h2>

		<table class="table">
			<thead>
				<tr>
					<th>Serial Number</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$bill = 0;
					$sno = 1;
					foreach ($_SESSION as $products) {
							$pdp = 0;
							$qnt = 0;
							echo "<tr>";
								echo "<td>" . ($sno++) . "</td>";
								echo "<form action='editProduct.php' method='POST'>";
									foreach ($products as $key => $value) {
										if ($key == 2) {
											echo "<td><input type='text' name='name$key' value='".$value."' class='form-control'></td>";
											$qnt = $value;
										}else if ($key == 1) {
											echo "<input type='hidden' name='name$key' value='". $value ."'>";
											echo "<td>" . $value . "</td>";
											$pdp = $value;
										}else if ($key == 0) {
											echo "<input type='hidden' name='name$key' value='". $value ."'>";
											echo "<td>" . $value . "</td>";
										}
									}

								$bill = ($pdp * $qnt);
								echo "<td>". ($bill) ."</td>";

								echo "<td><input type='submit' name='event' value='Update' class='btn btn-warning'></td>";
								echo "<td><input type='submit' name='event' value='Delete' class='btn btn-danger'></td>";

							echo "</tr>";
							echo "</form>";
					} 
				 ?>

			</tbody>
		</table>

		<div class="row text-center d-block">
			<div class="mt-5">
				<a href="index.php" class="btn btn-info">Continue Shopping</a>
				<a href="#" class="btn btn-success">Order Now</a>
			</div>
		</div>

	</div>
	



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>