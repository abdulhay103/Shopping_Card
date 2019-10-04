

<?php 
session_start();

if (isset($_SESSION['u_id'])) {
}
 ?>


<?php 
	require_once "header.php";
 ?>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<h1 class="py-3 text-center">Thanks</h1>
				<h3>Your order submited successfully..</h3>
				<h4>You will receive your product on 3 working days.</h4>
				<p class="text-center">Thank you for chosing eSoft Online Shope.</p>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row text-center d-block">
			<div class="mt-5">
				<a href="index.php" class="btn btn-info col-lg-4">Continue Shopping</a>
			</div>
		</div>
	</div>

	<?php require_once "footer.php" ?>