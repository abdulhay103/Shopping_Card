
<?php 

session_start();

	require_once ('config.php');


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
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Image</th>
						<th>Price</th>
					</tr>
				</thead>
				<form action="insertCart.php" method="post" class="form-control">
					<tbody>
						<tr>
							<td>shirt</td>
							<td><img src="img/product1.jpg" alt="product1" class="img-fluid" width="30%"></td>
							<td>1000$</td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type="text" name="qnty" class="form-control col-lg-6"></td>
							<input type="hidden" name="name" value="shirt">
							<input type="hidden" name="price" value="1000">
							<td><input type="submit" name="addCart" value="Add To Cart" class="btn btn-primary"></td>
						</tr>
					</tbody>
				</form> 
			</table>
		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>