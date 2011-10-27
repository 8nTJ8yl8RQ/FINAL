<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include'includes/DBconnect.php';


function GetSearch($inSurname=NULL, $inFirstname=NULL, $inCity=NULL, $inSport=NULL,
     			   $inSquadkind=NULL, $inTeamname=NULL, $inStatuskind=NULL)
{
	if (!empty($inSurname))
	{
		//$query = mysql_query("SELECT a.Surname, a.FirstName, a.MiddleInitial, s.Sport,
		//                     s.SquadKind, t.TeamName, st.StatusKind, g.FirstName, g.Surname, ad.  //FROM ORDER BY id DESC"); 
		
		$query = mysql_query("SELECT * FROM athlete UNION 
		                      SELECT * FROM guardian UNION
							  SELECT * FROM at_address UNION
							  SELECT * FROM   ORDER BY athlete.Surname DESC");
}
?>
</body>
</html>
