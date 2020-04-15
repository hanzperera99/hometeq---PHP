<?php  

	include('db.php') ;

	$pagename = "A smart buy for a smart home" ;

	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>" ;

	echo "<title>".$pagename."</title>" ;

	echo "<body>" ;

	include('head_file.html') ;
	echo "<br>";
	echo "<h4>".$pagename."</h4>";

	$prodid = $_GET["u_prod_id"] ;

	//create a $SQL variable and populate it with a SQL statement that retrieves product details
	$SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product WHERE prodId = $prodid";

	//run SQL query for connected DB or exit and display error message
	$exeSQL = mysqli_query($connection, $SQL) or die (mysqli_error());

	echo "<table style='border: 0px'>";
	//create an array of records (2 dimensional variable) called $arrayp.
	//populate it with the records retrieved by the SQL query previously executed.
	//Iterate through the array i.e while the end of the array has not been reached, run through it

		while ($arrayp=mysqli_fetch_array($exeSQL))
		{
			echo "<tr>";  
				echo "<td style='border: 2px'>";  
					echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">"; 
					//display the small image whose name is contained in the array  
					echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>"; 
					echo "</a>";
				echo "</td>";

				echo "<td style='border: 0px'>";  
					echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array 
					echo "<br>";
					echo "<p>". $arrayp['prodDescripLong'] ."</p>"; 
					echo "<br>";
					echo "<p>". "$ " . $arrayp['prodPrice'] ."</p>";
					echo "<br>";
					echo "<p>"."Number left in stock : ". $arrayp['prodQuantity'] ."</p>";

					echo "<form action = basket.php method = post>";

						#echo "<input type = text name = p_quantity size = 5 maxlength = 3>" ;

						$avail_items = $arrayp['prodQuantity'] ; 
						$current_item = 1 ;

						echo "<select name = p_quantity>";

							while ($current_item <= $avail_items) 
							{
								echo "<option value = $current_item>". $current_item ."</option>";
								$current_item ++ ;
							}
							echo "<input type = hidden name = h_prodquantity value = ".$current_item.">";
							#echo "<option value = >" "</option>";

						echo "</select>";

						echo "<input type = submit value = Add to Basket>";
						#echo "<input type = hidden name = h_prodquantity value = ".$current_item.">";
						//passing the prodId to the busket.php as a hidden variable
						echo "<input type = hidden name = h_prodid value = ".$prodid.">";

					echo "</form>";

				echo "</td>"; 
			echo "</tr>";
		}
	echo "</table>";

	#echo "<p>Selected product Id: ". $prodid ;

	include('foot_file.html') ;

	echo "</body>" ;

?>