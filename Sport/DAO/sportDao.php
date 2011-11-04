<?php

include_once 'Model/team.php';

$work_dir_was = getcwd(); 
chdir("../Coach"); 
include_once 'Model/coach.php'; 
include_once 'DAO/coachDao.php';
chdir($work_dir_was); 
chdir("../Squad");
require_once 'Model/squad.php';
require_once 'DAO/squadDao.php';
include_once "Model/mysqlConfig.php";
chdir($work_dir_was); 


$s;
// Change this info so that it works with your system.
//$connection = mysql_connect('localhost', 'root', 'n4UVFpHeHr') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");

//$database = "bulilit";
//mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");
	
$db = new MySQL("localhost","root" ,"" , "bulilit");
$db->connect();

function GetTeam($inId=null, $inTeamName =null, $inCoachName=null, $inSquadId=null)
{
global $db;
$sq = new Squad (null, null); 
$s = new SquadDao($db, $sq);
	
	if (!empty($inId))
	{
		$query = $db->query("SELECT * FROM Team T WHERE T.TeamID=" . $inId . " ORDER BY T.TeamID DESC") or die ("Error retrieving team with team id" . $inId); 
	}
	else if (!empty($inTeamName))
	{
		$query = $db->query("SELECT * FROM Team T WHERE T.TeamName like '%" .$inTeamName. "%' ORDER BY T.TeamID ASC"); 
	} 
	else if (!empty($inCoachName))
	{
		$query = $db->query("SELECT * FROM Team T where T.TeamID in(SELECT TC.TeamID FROM TeamCoach TC where TC.CoachID in (SELECT C.CoachID FROM Coach C where C.Name like '%". $inCoachName ."%'))  ORDER BY T.TeamID"); 
	}
	else if (!empty($inSquadId))
	{
//		$query = $db->query("SELECT DISTINCT TMD.SquadID from TeamMemDetails TMD where TMD.TeamID=".$inSquadId.""); 
		$query = $db->query("SELECT * FROM Team T WHERE T.TeamID IN(SELECT TMD.TeamID FROM TeamMemDetails TMD WHERE TMD.SquadID=".$inSquadId.")");
	}
	else {
		$query = $db->query("SELECT * FROM Team T ORDER BY T.TeamName ASC");
		}

	$teamArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$teamId = $row["TeamID"];
		$myCoachArray = GetCoach(null,null,null,$teamId);
		$mySquadArray = $s->GetSquad(null,null,$teamId);
		$myTeam = new Team($row["TeamID"], $row['TeamName'], $row['SportID'] , $myCoachArray, $mySquadArray);
		array_push($teamArray, $myTeam);
		}
	return $teamArray;
	}

function GetTeamByCoachId($inCoachId=null){
	global $db;
	$sq = new Squad (null, null); 
	$s = new SquadDao($db, $sq);
	if (!empty($inCoachId))
	{
		$query = $db->query("SELECT * FROM Team T WHERE T.TeamID IN(SELECT TC.TeamID FROM TeamCoach TC where TC.CoachID=". $inCoachId .")") or die ("<p class='error'>Sorry, we were unable to retrieve the coaches of team ". $inCoachId ." from the database server.</p>"); 
	}
	$teamArray = array();
	
	while ($row = mysql_fetch_assoc($query))
	{
		$teamId = $row["TeamID"];
		$mySquadArray = $s->GetSquad(null,null,$teamId);
		$myTeam = new Team($row["TeamID"], $row['TeamName'], $row['SportID'] , null, $mySquadArray);
		array_push($teamArray, $myTeam);
	}
	
	return $teamArray;
}
function AddTeam($inSportId=null, $inTeamName =null, $inCoachId=null, $inSubCoachIds=null)
{

		$connection = mysql_connect('localhost', 'root', '') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
		$database = "bulilit";
		mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");
		$querystring= "INSERT INTO Team(SportID,TeamName) VALUES(".$inSportId.",'".$inTeamName."')";
		$query = mysql_query($querystring) or die ("Error in Team Creation");
		$teamId = mysql_insert_id();
		AddTeamHeadCoach($teamId, $inCoachId);
		AddTeamSubCoaches($teamId, $inSubCoachIds) or die ("Error in adding sub coaches");
	}

function AddTeamHeadCoach($inTeamId=null, $inCoachId=null)
{
	global $db;
	$query = $db->query("INSERT INTO TeamCoach(TeamID,CoachID,HeadCoach) VALUES(".$inTeamId.",".$inCoachId.",'Yes')") or die ("Error in adding Head Coach");
}

function AddTeamSubCoaches($inTeamId=null, $inSubCoachIds=null)
{
	global $db;
	foreach($inSubCoachIds as $s){
		$query = $db->query("INSERT INTO TeamCoach(TeamID,CoachID,HeadCoach) VALUES(".$inTeamId.",".$s.",'No')") or die ("Error in adding Sub Coaches");
		echo "hheeeyy";
	}
	return true;
}

function DeleteTeam($inTeamId=null)
{
	global $db;
		$query = $db->query("DELETE FROM TeamCoach where TeamID=".$inTeamId."") or die ("Error deleting team");
		$query = $db->query("DELETE from Team WHERE TeamID=".$inTeamId."") or die ("Error deleting team"); 
	}

function EditTeam($inTeamId, $inSportId=null, $inTeamName =null, $inCoachId=null, $inSubCoachIds=null)
{
	global $db;
		$teams = GetTeam($inTeamId);
		$coaches;
		foreach($teams as $team){
			$coaches = $team->coachIds;
		}
		if($coaches == null){
			AddTeamHeadCoach($inTeamId, $inCoachId);
		} else {
			$query = $db->query("UPDATE TeamCoach SET HeadCoach='Yes' WHERE TeamID=".$inTeamId." and CoachID=".$inCoachId."") or die ("Error updating team Head Coach");
		}
		
		if($coaches == null){
			AddTeamSubCoaches($inTeamId, $inSubCoachIds);
		} else {
			foreach($inSubCoachIds as $s){
				$query = $db->query("UPDATE TeamCoach SET HeadCoach='No' WHERE TeamID=".$inTeamId." and CoachID=".$s."") or die ("Error updating team Assistant Coaches");
			}
		}
		
		$query = $db->query("UPDATE Team SET SportID=".$inSportId.", TeamName='". $inTeamName ."' WHERE TeamID=".$inTeamId) or die ("Error updating team name");
	}
?>
