<?php
	
	//Logging the errors after this statement in error logs
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	try{
		//Establishing Connection with Server
		$mysqli = mysqli_connect("localhost", "root", "");

		//Selecting Database from Server
		$db = mysqli_select_db($mysqli, "test");

		//connecting to the database
		//$mysqli = new mysqli("localhost", "root", "", "test");

	}catch(Exception $e){

		error_log($e->getMessage());
		exit("Error connecting to database");

	}

	//setting the character set
	$mysqli->set_charset("utf8mb4");

	$name = $_GET['uname'];
	$pass = $_GET['pass'];

	$stmt = $mysqli->prepare("INSERT INTO sqli(uname,pwd) VALUES(?, ?)");
	$stmt->bind_param("ss", $name, $pass);
	$stmt->execute();

	echo $mysqli->info;
	

	$stmt->close();
?>