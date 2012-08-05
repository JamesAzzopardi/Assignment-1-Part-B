<html>
	<head>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html401/loose.dtd">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Wine Select Form</title>
	</head>

	<body>

  		<form action="query.php" method="GET">
			<table>
				<tr><td>Wine Name:</td><td><input type="text" name="wineName" /></td></tr>
				<tr><td>Winery Name:</td><td><input type="text" name="wineryName" /></td></tr>	
				
				<?php
						require 'db.php';
						
						if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
							die("Could not connect");
						}	
						mysql_select_db("winestore", $connection);

						$query = "SELECT region_name FROM region GROUP BY region_name";
						$result = mysql_query($query);

						print "<tr><td>Region:</td><td>";
						print "<select name='region_name'>";
						while ($row = mysql_fetch_array($result)) {
							print "<option value='" . $row['region_name'] . "'>" . $row['region_name'] . "</option>";
						}
						
						print "</select></td></tr>";
						
						$query1 = "SELECT variety FROM grape_variety GROUP BY variety";
						$result1 = mysql_query($query1);

						print "<tr><td>Grape Variety:</td><td>";
						print "<select name='variety'>";
						while ($row = mysql_fetch_array($result1)) {
							print "<option value='" . $row['variety'] . "'>" . $row['variety'] . "</option>";
						}
						print "</select></td></tr>";
				?>
				
				<br />
				<tr><td></td><td><input type="submit" value="Show wines"><td></tr>			
			</table>
		</form>

	</body>
</html>	


