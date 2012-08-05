<html>
	<head>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html401/loose.dtd">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Wine Results Form</title>
	</head>

	<body>

	<?php
		print $winename;
  		require 'db.php';
	       $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
  		mysql_select_db("winestore", $connection);
		$query = "SELECT * FROM wine where wine_name = '$wineName'";
		$result = mysql_query($query, $connection);


		 while ($row = mysql_fetch_row($result)) {
  		 for ($i = 0; $i < mysql_num_fields($result); $i++) {
    		  echo $row[$i] . " ";
   		}
   // Print a carriage return to neaten the output
   echo "\n";
  }

  // Finish the HTML document
  echo "</pre>";

  // (4) Close the database connection
  mysql_close($connection);
	?>
	</body>
</html>	
