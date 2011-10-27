<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>athleteSearch</title>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>

<body>
    <form action="athleteSearchResult.php" method="post">

	<span class="style1">Choose search type:</span>
	<select name="searchtype">
	   <option value="Surname">Last name</option>
           <option value="FirstName">First name</option>
           <!--option value="City">Address</option>
           <option value="Sport">Sport</option>
           <option value="SquadKind">Squad</option>
           <option value="TeamName">Team</option>
           <option value="StatusKind">Status</option--> 
	</select>
	
	<span class="style1">Enter Search Term:</span>
	<input name ="searchterm" type="varchar">
        
	<input type="submit" value="Search">
</form>
</body>
</html>
