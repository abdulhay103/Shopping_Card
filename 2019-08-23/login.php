

<?php 

session_start();

require_once "config.php";

if (isset($_POST['submit'])) {
	if(!isset($_SESSION['u_email'])){
	$userName = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Error Handlers
	//Check if inputs are empty
	if (empty($userName) || empty($password)) {
		header("Location: login.php?login=empty");
	}else{
		$sql= "SELECT * FROM signup_table WHERE userName = '$userName' OR email= '$userName'";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck < 1) {
			header("Location: login.php?login=error");
			
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: login.php?login=error");
					exit();
				}elseif ($hashedPwdCheck == true) {
					// Log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_fname'] = $row['firstName'];
					$_SESSION['u_lname'] = $row['lastName'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_uname'] = $row['userName'];
					header("Location: index.php");
					exit();
				}
			}
		}
	}
} else {
	echo "<script>alert('Your are login with .$_SESSION['u_fname']')</Script>";
	// header("Location: index.php");
}
}

?>


<?php 
	require_once "header.php";
 ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form class="" action="login.php" method="POST">
					<h2 class="text-center">Log In</h2>
			  		<input type="text" placeholder="Email/UserName" name="email" class="form-control" required><br>
			  		<input type="password" placeholder="Your Password" name="password" class="form-control" required><br>
			  		<input type="submit" name="submit" class="btn btn-success form-control">
			  		<p class="text-center">You have no account? <a href="signup.php">Sign here</a>.</p>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

