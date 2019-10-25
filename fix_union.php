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

	$stmt = $mysqli->prepare("SELECT uname, pwd FROM sqli WHERE uname = ?");
	$stmt->bind_param("s", $name);
	$stmt->execute();

	$result = $stmt->get_result();

	if($result->num_rows === 0){
		exit('No rows');
	}

	while($row = $result->fetch_assoc()){
		echo "<br> username: " . $row["uname"] . " <br> Password: " . $row["pwd"] . "<br>";
	}

	$stmt->close();
?>