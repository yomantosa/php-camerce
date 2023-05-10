<?php 

	$user = "root";
	$pass = "";
	$dsn = "mysql:host=localhost;dbname=mvc_db";

	try {

		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		//echo "connect";

	} catch (Exception $e) {
		echo " Error ".$e->getMessage();
		exit(); 
	}

 ?>