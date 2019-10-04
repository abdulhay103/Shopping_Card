

<?php 

	require_once "config.php";
	echo "<br>";

	$sql = "CREATE DATABASE eshop";
		if (mysqli_query($conn, $sql)) {
    	echo "Database created successfully";
		} 
		else {
  			echo "Error creating database: " . mysqli_error($conn);
		}

	 $sql = "CREATE TABLE ecommars (
	 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	 product_name VARCHAR(30) NOT NULL,
	 product_img VARCHAR(30) NOT NULL,
	 quantity INT(8) NOT NULL,
	 price INT(8) NOT NULL,
	 reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	 )";
	if (mysqli_query($conn, $sql)) {
    	echo "Table Ecommars created successfully";
	}
	 else {
 			echo "Oh Hoo....! Error creating table: " . mysqli_error($conn);
	}


	$sql = "INSERT INTO ecommars (id,product_name,product_img, quantity, price)VALUES 
	(1,'computer1', 'img/product1.jpg', '1','15' ),
	(2,'computer2', 'img/product1.jpg', '1','35' ),
	(3,'computer3', 'img/product3.jpg', '1','20' )
	";
	if (mysqli_query($conn, $sql)) {
		echo "Your Data Insert successfully";
	}
	else{
		echo "Data Insert Fail" . mysqli_error($conn);
	}
 



	// mysqli_close($conn);