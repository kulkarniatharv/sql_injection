<?php
	//Establishing Connection with Server
	$connection = mysqli_connect("localhost", "root", "");

	//Selecting Database from Server
	$db = mysqli_select_db($connection, "test");
	print_r($_POST);
   
	//Fetching variables of the form which travels in URL
    
    $name = $_GET['uname'];
    $email = $_GET['pass'];
    echo $name;
    echo $email;

	//Insert Query of SQL
	//$query = "insert into sqli(uname, pwd) values ('$name', '$email')";
	//$query = "insert into sqli(uname,pwd) values ('$name', '$email')";

	
	$query = "insert into sqli(uname, pwd) values('" . $name . "', '" . $email . "')";
	mysqli_multi_query($connection, $query);

	//Closing Connection with Server
	mysqli_close($connection);
?>