<html>
	<head>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html401/loose.dtd">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Wine Results Form</title>
	</head>

	<body>
		<?php
			  function showerror() {
				 die("Error " . mysql_errno() . " : " . mysql_error());
			  }
			//Gets the information required to connect from the db.php
			require 'db.php';
			
			// get the user data
			$wineName = $_GET['wineName'];
			
			// Connect to the MySQL server
			if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
				die("Could not connect");
			}	
			mysql_select_db("winestore", $connection);
			$query = "SELECT wine_name, winery_name
				FROM wine, winery
				WHERE wine.winery_id = winery.winery_id";
			
			
			if (isset($wineName) && $wineName != "") {
			$query .= " AND wine_name = '{$wineName}' ";
			} 
			
			function displayWines($connection, $query) {
			
			// Run the query on the server
			if (!($result = @ mysql_query ($query, $connection))) {
			  showerror();
			}
			
			$rowsFound = @ mysql_num_rows($result);

			// If the query has results ...
			if ($rowsFound > 0) {
			  // and start a <table>.
			  print "\n<table>\n<tr>" .
				  "\n\t<th>Wine Name</th>" .
				  "\n\t<th>Winery</th></tr>" ;

			  // Fetch each of the query rows
			  while ($row = @ mysql_fetch_array($result)) {
				// Print one row of results
				print "\n<tr>\n\t<td>{$row["wine_name"]}</td>" .
					"\n\t<td>{$row["winery_name"]}</td>\n</tr>";
			  } // end while loop body

			  // Finish the <table>
			  print "\n</table>";
			} // end if $rowsFound body

			// Report how many rows were found
			print "{$rowsFound} records found matching your criteria<br>";
		  } // end of function
		  
			displayWines($connection, $query);
		?>
	</body>
</html>	
