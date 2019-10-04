
<?php 
session_start();

require_once "config.php";

// sql to create table


$sql = "CREATE TABLE signup_table (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstName VARCHAR(20) NOT NULL,
lastName VARCHAR(20) NOT NULL,
email VARCHAR(30) NOT NULL,
userName VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Signup_table created successfully";
}




// Data Insert Into Table

if (isset($_POST['creat_acount'])) {
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$userName = mysqli_real_escape_string($conn, $_POST['userName']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	//Error handlers
	//Check for empty fields

	if (empty($firstName) || empty($lastName) || empty($email) || empty($userName) || empty($password)) {
		header("Location: signup.php?signup=empty" . mysqli_connect_error());
		exit();
	}else{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header("Location: signup.php?signup=ivalid" . mysqli_connect_error());
			// exit();
		}else{
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: signup.php?signup=email" . mysqli_connect_error());
				// exit();
			}else{
				$sql = "SELECT * FROM signup_table WHERE userName = '$userName'";
				$result = mysqli_query($conn, $sql);
				$checkresult = mysqli_num_rows($result);

				if ($checkresult > 0) {
					header("Location: signup.php?signup=usertaken" . mysqli_connect_error());
					// exit();
				}else{
					//Hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//Insert the user into database
					$sql = "INSERT INTO signup_table (firstName, lastName, email, userName, password)
						VALUES ('$firstName', '$lastName', '$email', '$userName', '$hashedPwd' ) ";
					mysqli_query($conn, $sql);
					header("Location: login.php?signup=signup_success" . mysqli_connect_error());
					// exit();

				}
			}
		}
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
				<?php if(!isset($_SESSION['email'])): ?>
				<form class="text-center " action="" method="POST">
					<h2>Sign Up</h2>
			  		<input type="text" placeholder="First Name" name="firstName" class="form-control" required><br>
			  		<input type="text" placeholder="Last Name" name="lastName" class="form-control" required><br>
			  		<input type="email" placeholder="Your Email Address" name="email" class="form-control" required><br>
			  		<input type="text" placeholder="Use Name" name="userName" class="form-control" required><br>
			  		<input type="password" placeholder="Your Password" name="password" class="form-control" required><br>
			  		<input type="submit" name="creat_acount" class="btn btn-success form-control">
			  		<p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
				</form>
			<?php endif; ?>
				<?php if (isset($_GET['signup'])): ?>
					<?php if($_GET['signup']== 'usertaken'): ?>
						<div class="error">Username already Taken</div>
					<?php endif ?>
				<?php endif ?>
				<?php if(isset($_GET['signup'])): ?>
					<?php if($_GET['signup']== 'ivalid'): ?>
					<div class="invalid">Invalid Input</div>
				<?php endif ?>
			<?php endif ?>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

<?php require_once "footer.php" ?>