<?php  
	session_start(); 
	include("db.php") ;

	$pagename = "Clear Smart Basket" ;

	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>" ;

	echo "<title>". $pagename ."</title>";

	echo "<body>" ;

	include ('head_file.html') ;

		echo "<h4>". $pagename ."</h4>";

		unset($_SESSION['basket']) ;

		echo "Your basket has been cleared" ;
		echo "<br>"; echo "<br>";

		

	include ('foot_file.html') ;

	echo "</body>";

?>