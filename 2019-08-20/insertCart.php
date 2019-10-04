
<?php 
	
	session_start();
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$quantity = $_POST['qnty'];

	$product = array($name, $price, $quantity);

	$_SESSION[$name] = $product;

	header('location:index.php');  

 ?>