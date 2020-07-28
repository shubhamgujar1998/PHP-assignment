<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Product";
	$conn = mysqli_connect($servername,$username,$password, $dbname);

	if(!$conn){
		echo "Error connecting to Database!!";
	}
	
 ?>