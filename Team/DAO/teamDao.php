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
chdir($work_dir_was); 


// Change this info so that it works with your system.
$connection = mysql_connect('localhost', 'root', 'n4UVFpHeHr') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "bulilit";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetTeam($inId=null, $inTeamName =null, $inCoachName=null, $inSquadId=null)
{
	if (!empty($inId))
	{
		$query = mysql_query("SELECT * FROM Team T WHERE T.TeamID=" . $inId . " ORDER BY T.TeamID DESC") or die ("Error retrieving team with team id" . $inId); 
	} 
	else if (!empty($inTeamName))
	{
		$query = mysql_query("SELECT * FROM Team T WHERE T.TeamName like '%" .$inTeamName. "%' ORDER BY T.TeamID ASC"); 
	} 
	else if (!empty($inCoachName))
	{
		$query = mysql_query("SELECT * FROM Team T where T.TeamID in(SELECT TC.TeamID FROM TeamCoach TC where TC.CoachID in (SELECT C.CoachID FROM Coach C where C.Name like '%". $inCoachName ."%'))  ORDER BY T.TeamID"); 
	}
	else {
		$query = mysql_query("SELECT * FROM Team T ORDER BY T.TeamName ASC");
		}
	$teamArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$teamId = $row["TeamID"];
		$myCoachArray = GetCoach(null,null,null,$teamId);
		$mySquadArray = GetSquad(null,null,$teamId);
		$myTeam = new Team($row["TeamID"], $row['TeamName'], $row['SportID'] , $myCoachArray, $mySquadArray);
		array_push($teamArray, $myTeam);
		}
	return $teamArray;
	
	}
	
function AddTeam($inSportId=null, $inTeamName =null, $inCoachId=null, $inSubCoachIds=null)
{
		$query = mysql_query("INSERT INTO Team(SportID,TeamName) VALUES(".$inSportId.",'".$inTeamName."')") or die ("Error in Team Creation");
		$teamId = mysql_insert_id();
		AddTeamHeadCoach($teamId, $inCoachId);
		AddTeamSubCoaches($inTeamId, $inSubCoachIds);
	}

function AddTeamHeadCoach($inTeamId=null, $inCoachId=null)
{
	$query = mysql_query("INSERT INTO TeamCoach(TeamID,CoachID,HeadCoach) VALUES(".$inTeamId.",".$inCoachId.",'Yes')") or die ("Error in adding Head Coach");
}

function AddTeamSubCoaches($inTeamId=null, $inSubCoachIds=null)
{
	foreach($inSubCoachIds as $s){
		$query = mysql_query("INSERT INTO TeamCoach(TeamID,CoachID,HeadCoach) VALUES(".$inTeamId.",".$s.",'No')") or die ("Error in adding sub coaches");
	}
}

function DeleteTeam($inTeamId=null)
{
		$query = mysql_query("DELETE FROM TeamCoach where TeamID=".$inTeamId."") or die ("Error deleting team");
		$query = mysql_query("DELETE from Team WHERE TeamID=".$inTeamId."") or die ("Error deleting team"); 
	}

function EditTeam($inTeamId, $inSportId=null, $inTeamName =null, $inCoachId=null, $inSubCoachIds=null)
{
		$teams = GetTeam($inTeamId);
		$coaches;
		foreach($teams as $team){
			$coaches = $team->coachIds;
		}
		if($coaches == null){
			AddTeamHeadCoach($inTeamId, $inCoachId);
		} else {
			$query = mysql_query("UPDATE TeamCoach SET HeadCoach='Yes' WHERE TeamID=".$inTeamId." and CoachID=".$inCoachId."") or die ("Error updating team Head Coach");
		}
		
		if($coaches == null){
			AddTeamSubCoaches($inTeamId, $inSubCoachIds);
		} else {
			foreach($inSubCoachIds as $s){
				$query = mysql_query("UPDATE TeamCoach SET HeadCoach='No' WHERE TeamID=".$inTeamId." and CoachID=".$s."") or die ("Error updating team Assistant Coaches");
			}
		}
		
		$query = mysql_query("UPDATE Team SET SportID=".$inSportId.", TeamName='". $inTeamName ."' WHERE TeamID=".$inTeamId) or die ("Error updating team name");
	}
?>
