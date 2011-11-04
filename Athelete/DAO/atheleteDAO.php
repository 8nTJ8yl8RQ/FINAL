<?php

require_once('../Athelete/model/athelete.php');

//ini_set('display_errors', 'On');
// Change this info so that it works with your system.
$connection = mysql_connect('localhost', 'root', '') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "bulilit";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetAthelete($inId=null, $inName =null)
{
	if (!empty($inId))
	{
		$query = mysql_query("SELECT * FROM Athlete A WHERE A.MembershipID=". $inId ."ORDER BY A.AtheleteID DESC"); 
	}
	else {
		$query = mysql_query("SELECT * FROM Athlete A ORDER BY A.FirstName ASC");
		}
	$atheleteArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$myAthelete = new Athelete($row["MembershipID"], $row['FirstName']);
		array_push($atheleteArray, $myAthelete);
		}
	return $atheleteArray;
	}

function GetAtheleteViaTeamId($inTeamId=null)
{
	$query = mysql_query("SELECT * FROM Athlete A WHERE A.MembershipID IN (SELECT TM.MembershipID from TeamMemDetails TM where TM.TeamID=".$inTeamId.")") or die ("<p class='error'>Sorry, we were unable to get the players via team from the database.</p>");
	$atheleteArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$myAthelete = new Athelete($row["MembershipID"], $row['FirstName']);
		array_push($atheleteArray, $myAthelete);
		}
	return $atheleteArray;
}
?>
