<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Display After Delete</title>
</head>

<body>
<?php
$db = mysql_connect("localhost", "root", "n4UVFpHeHr");
mysql_select_db("bulilit",$db);

$result = mysql_query("SELECT * FROM athlete order by Surname",$db);
?>
</body>
</html>
