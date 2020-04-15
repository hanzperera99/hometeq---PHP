<?php  

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = "w1715077_0";

	//creating the db connection
	$connection =mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) ;

	//checking the connection
	if (!$connection) 
	{
		die('Could not connect: ' . mysqli_error($conn)); 
	}

	//selecting the database
	mysqli_select_db($connection, $dbname) ;

?>