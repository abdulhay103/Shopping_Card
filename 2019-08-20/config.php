<?php 


$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "esoftdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully" .  mysqli_get_host_info($conn);


// $sql = "CREATE TABLE computershop (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// name VARCHAR(30) NOT NULL,
// image VARCHAR(30) NOT NULL,
// price VARCHAR(20) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if (mysqli_query($conn, $sql)) {
//     // echo "Table computershop created successfully";
// } else {
//     // echo "Error creating table: " . mysqli_error($conn);
// }


// $sql = "INSERT IGNORE INTO computershop (id, name, image, price) VALUES
// 		(1, 'computer1', 'img/product1.jpg', '1500'),
// 		(2, 'computer2', 'img/product3.jpg', '2500')
// 	";
// if (mysqli_query($conn, $sql)) {
// 	// echo "ok";
// }else{
// 	// echo "no" . mysqli_error($conn);
// }


?>