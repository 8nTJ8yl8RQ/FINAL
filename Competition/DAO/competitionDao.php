<?php
ini_set('display_errors', 'On');
include 'Model/competition.php';
require_once('../Coach/Model/coach.php');
require_once('../Coach/DAO/coachDao.php');
// Change this info so that it works with your system.
$connection = mysql_connect('localhost', 'root', 'n4UVFpHeHr') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "bulilit";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetCompetition($inId=null)
{
	if (!empty($inId))
	{
		$query = mysql_query("SELECT * FROM bulilit.TeamCompetitionHistory T WHERE T.CompetitionID = '" . $inId . "' ORDER BY T.CompetitionID DESC"); 
	} else {
		$query = mysql_query("SELECT * FROM bulilit.TeamCompetitionHistory T ORDER BY T.CompetitionID ASC");
	}
	$competitionArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$myCompetition = new Competition($row["CompetitionID"], $row['CompName'], $row['Date'], $row['Time'], $row['Venue'], $row['TeamID']);
		array_push($competitionArray, $myCompetition);
		}
	return $competitionArray;
	}
	
function AddCompetition($inTeamId=null, $inCompName=null, $inDate=null, $inTime=null, $inVenue=null, $inMembers=null, $inPoints=null, $inRolePositions=null)
{
	$query = mysql_query("INSERT INTO TeamCompetitionHistory(TeamID, CompName, Date, Time, Venue) VALUES(".$inTeamId.",'". $inCompName ."','". $inDate ."','". $inTime ."','". $inVenue ."')") or die ("<p class='error'>Sorry, we were unable to save the competition to the database.</p>");
	$competitionId = mysql_insert_id();
	$headCoachId = GetCoach(null, null, null, $inTeamId=null);
	
		if(isset($inPoints)){
			for ($i=0;$i <= count($inMembers) -1; $i++){
				AddCompetitionMembers($competitionId,$inMembers[$i],$headCoachId[0]->id,$inPoints[$i],$inRolePositions[$i]);
			}
		} else {
			for ($i=0;$i <= (count($inMembers)-1); $i++){
				AddCompetitionMembers($competitionId,$inMembers[$i],$headCoachId[0]->id,null,$inRolePositions[$i]);
			}
		}
	}

function AddCompetitionMembers($inCompetitionId=null,$inMembershipId=null,$inCoachId=null,$inPoints=null,$inRolePosition=null){
	$query = mysql_query("INSERT INTO CompetitionParticipants(CompetitionID,MembershipID,CoachID,Points,RolePosition) VALUES(".$inCompetitionId.",".$inMembershipId.",".$inCoachId.",0,'".$inRolePosition."')")  or die ("<p class='error'>Sorry, we were unable to add the competition participants to the database.</p>");
}	
	
function DeleteCompetition($inCompetitionId=null)
{		
		mysql_query("DELETE from CompetitionParticipants WHERE CompetitionID=".$inCompetitionId."") or die ("<p class='error'>Sorry, we were unable to delete the competition participants from the database.</p>"); 
		$query = mysql_query("DELETE from TeamCompetitionHistory WHERE CompetitionID=".$inCompetitionId."") or die ("<p class='error'>Sorry, we were unable to delete the competition from the database.</p>"); 
	}

function EditCompetitionMembers($inCompetitionId=null,$inMembershipId=null,$inCoachId=null,$inPoints=null,$inRolePosition=null)
{
		mysql_query("UPDATE CompetitionParticipants SET MembershipID=".$inMembershipId.", CoachID=".$inCoachId.", RolePosition='".$inRolePosition."', Points=".$inPoints." WHERE CompetitionID=".$inCompetitionId."") or die ("<p class='error'>Sorry, we were unable to update the competition participants from the database.</p>"); 
		return true;	
}	
	
function EditCompetition($inCompetitionId=null, $inTeamId=null, $inCompName=null, $inDate=null, $inTime=null, $inVenue=null, $inMembers=null, $inPoints=null, $inRolePositions=null)
{
		
		var_dump($inRolePositions);
		$query = mysql_query("UPDATE bulilit.TeamCompetitionHistory T SET T.CompetitionID=".$inCompetitionId.", T.TeamID=".$inTeamId.", T.CompName='".$inCompName."', T.Date='".$inDate."', T.Time='".$inTime."', T.Venue='".$inVenue."' WHERE T.CompetitionID=".$inCompetitionId)  or die ("<p class='error'>Sorry, we were unable to update the competition to the database.</p>"); 
		$headCoachId = GetCoach(null, null, null, $inTeamId=null);
		if(isset($inPoints)){
			for ($i=0;$i <= count($inMembers) -1; $i++){
			
				EditCompetitionMembers($inCompetitionId,$inMembers[$i],$headCoachId[0]->id,$inPoints[$i],$inRolePositions[$i]);
			}
		} else {
		
			for ($i=0;$i <= (count($inMembers)-1); $i++){
			var_dump($inMembers[$i]);
				EditCompetitionMembers($inCompetitionId,$inMembers[$i],$headCoachId[0]->id,0,$inRolePositions[$i]);
			}
		}
		return true;
}
?>
