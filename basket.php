<?php
	
	session_start() ; 

	include('db.php') ;

	$pagename = "Smart Basket" ;

	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>" ;

	echo "<title>". $pagename ."</title>";

	echo "<body>" ;

	include('head_file.html') ;

	echo "<br>";
	echo "<h4>". $pagename ."</h4>";

	//create a new cell in the  basket session array. Index this cell with the new product id. 
	//Inside the cell store the required product quantity  

	echo "<body>";

	if (isset($_POST["h_prodid"])) 
	{
		$newprodid = $_POST["h_prodid"] ; //id of the ordered product
		$reququantity = $_POST["p_quantity"] ; //amount of the order
		$_SESSION['basket'][$newprodid]=$reququantity;	

		//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
		echo "<p>1 item added";
		echo "<br>";
		echo "<br>";
	}
	else
	{
		echo "Current basket unchanged..";
		echo "<br>";
	}

	echo "<br>";
	$message = "clear the basket" ;

	echo "<a href = clearbasket.php>". $message ."</a>";

	echo "<table style='border: 1px'>";

		echo "<tr>";
			echo "<th>Product Name</th>";
			echo "<th>Price</th>";
			echo "<th>Quantity</th>";
			echo "<th>Subtotal</th>";
			#echo "<th>" "</th>";
		echo "</tr>";


	if (isset($_SESSION['basket']))
	{
		$total=0;
		foreach($_SESSION['basket'] as $index => $value)
		{
			//create a $SQL variable and populate it with a SQL statement that retrieves product details
			$SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product WHERE prodId = $index";

			//run SQL query for connected DB or exit and display error message
			$exeSQL = mysqli_query($connection, $SQL) or die (mysqli_error()) ;

			$arrayp=mysqli_fetch_array($exeSQL) ;

					echo "<tr>";

						echo "<td style='border: 2px'>";   
							echo "<p>". $arrayp['prodName'] ."</p>"; 
						echo "</td>";

						echo "<td style='border: 2px'>";  
							echo "<p>". $arrayp['prodPrice'] ."</p>";
						echo "</td>"; 

						echo "<td style='border: 2px'>";  
							echo $value;
						echo "</td>";

						echo "<td style='border: 2px'>";  
							echo $value;
						echo "</td>";

					echo "</tr>";
		}
		echo"<tr>";
			echo"<th colspan='3'>TOTAL</th>";
				echo"<td><p><b>&pound;".number_format((float)$total, 2, '.', '')."</b></p></td>";
		echo"</tr>";

		echo "<form action = basket.php method = post>";
			echo "<input type = submit value = remove>";
		echo "</form>";
	}
	else
	{			
	echo"<tr>";
		echo"<th colspan='3'>TOTAL</th>";
			echo"<td><p><b>&pound;0</b></p></td>";
		echo"</tr>";
	echo"<p><b>Empty Basket</b></P>";
	}			

	echo "</table>";
	echo "<br>";
	echo "<br>";

	echo "<p>". "New Hometeq customers " . "<a href = signup.php>". "Sign up" ."</a>" ."</p>";
	#echo "<a href = signup.php>". "Sign up" ."</a>" ;
	echo "<br>";
	echo "<p>". "Returning Hometeq customers " . "<a href = login.php>". "Login" ."</a>" ."</p>";
	#echo "<a href = login.php>". "Login" ."</a>" ;
	echo "<br>";echo "<br>";

	include ('foot_file.html');

	echo "</body>";
?>