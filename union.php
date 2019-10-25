<?php
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "test";

	//Create connection
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "test");
	//$conn = new mysqli($servername, $username, $password, $dbname);
	
	//Check connection
	if($connection->connect_error){
		die("Connection Failed: ". $conn->connect_error);
	}

	$name = $_GET['uname'];

	//vulnerable sql statement
	$sql = "select uname, pwd from sqli where uname = '" . $name . "'";

	$result = mysqli_query($connection,$sql);

	if(mysqli_num_rows($result) > 0){
		//output data of each row
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<br> username: " . $row["uname"] . " <br> Password: " . $row["pwd"] . "<br>";
		}
	}else{
		echo "0 results";
	}

mysqli_close($connection);
?>
