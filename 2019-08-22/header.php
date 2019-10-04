<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart || Php</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome-5.9.0/css/all.min.css">
</head>
<header>
	<div class="container">
		<nav class="navbar">
			<a href="index.php" class="text-left">eSoft Online Shop</a>
			<div class="logOpp text-right">
				<?php if(!isset($_SESSION['u_email'])): ?>
				<a href="login.php">Log In</a>
				<a href="signup.php">Sign Up</a>
				<?php else: ?>
				<a href="logout.php">Log Out</a>
			<?php endif ?>
				<a href="viewCart.php"><i class="fas fa-cart-plus"></i><span class="px-2">Cart</span></a>
			</div>
		</nav>
	</div>	
</header>
<h1 class="text-center py-2 text-info">eSoft Online Shopping Zoon</h1>
