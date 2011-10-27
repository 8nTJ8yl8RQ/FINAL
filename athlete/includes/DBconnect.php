<title>DBconnect</title>

<?php
	$connection = mysql_connect('localhost', 'root', 'n4UVFpHeHr') 
				or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
	$database = "bulilit2";
	mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");
?>
