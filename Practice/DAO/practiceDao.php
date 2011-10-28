<?php
include 'Model/practice.php';
// Change this info so that it works with your system.
$connection = mysql_connect('localhost', 'root', 'n4UVFpHeHr') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "bulilit";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetPractice($inId=null, $inTeamId=null)
{

	if (!empty($inId))
	{
		$query = mysql_query("SELECT * FROM Practice P where PracticeID=". $inId ." ORDER BY P.PracticeID DESC") or die ("<p class='error'>Sorry, we were unable to retrieve the practice details from the database.</p>"); 
	} 
	else {
		$query = mysql_query("SELECT * FROM Practice P ORDER BY P.PracticeID ASC") or die ("<p class='error'>Sorry, we were unable to retrieve the practice details from the database.</p>");
		}
		
	$practiceArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$myPractice = new Practice($row["PracticeID"], $row['TeamID'], $row['Date'], $row['Time'], $row['Venue']);
		array_push($practiceArray, $myPractice);
		}
	return $practiceArray;
	}

function AddPractice($inTeamId=null, $inDate=null, $inTime=null, $inVenue=null, $inPlayers, $inPositions, $inScores){
	if (($inTeamId == 0) or ($inTeamId==null)) {
		die ("<p class='error'>Please choose a team!</p>");
	}
	$query = mysql_query("INSERT INTO Practice(TeamID,Date,Time,Venue) VALUES(".$inTeamId.",'".$inDate."','".$inTime."','".$inVenue."')") or die ("<p class='error'>Sorry, we were unable to add the practice schedule to the database.</p>"); 
		$practiceId = mysql_insert_id();
		for ($i = 0; $i <= count($inPlayers) - 1; $i++){
		    AddPracticePlayers($practiceId,$inTeamId,$inPlayers[$i],$inPositions[$i],0) or die ("<p class='error'>Sorry, we were unable to add the newly created practice schedule's players to the database.</p>");
		}
		echo '<br />You have successfully added a practice schedule';
		return true;
}

function AddPracticePlayers($inPracticeId=null, $inTeamId=null, $inPlayerId=null, $inPosition=null, $inScore=null){
	$query = mysql_query("INSERT INTO PracticeDetails(PracticeID,TeamID,MembershipID,RolePosition,Points) VALUES(".$inPracticeId.",".$inTeamId.",".$inPlayerId.",'".$inPosition."',".$inScore.")") or die ("<p class='error'>Sorry, we were unable to add the practice session's players to the database.</p>"); 
	echo 'You have successfully added a practice schedule\'s players';
	return true;
}

function DeletePractice($inPracticeId=null)
{
		DeletePracticePlayers($inPracticeId);
		$query = mysql_query("DELETE FROM Practice WHERE PracticeID=".$inPracticeId."") or die ("<p class='error'>Sorry, we were unable to add practice details to the database.</p>"); 
	}

function DeletePracticePlayers($inPracticeId=null)
{
		$query = mysql_query("DELETE FROM PracticeDetails WHERE PracticeID=".$inPracticeId."") or die ("<p class='error'>Sorry, we were unable to add practice details to the database.</p>"); 
	}
	
function EditPracticePlayers($inPracticeId=null, $inTeamId=null, $inPlayerId=null, $inPosition=null)
{
	$query = mysql_query("UPDATE PracticeDetails SET RolePosition='".$inPosition."' WHERE PracticeID=".$inPracticeId." AND TeamID=".$inTeamId." AND MembershipID=".$inPlayerId."") or die ("<p class='error'>Sorry, we were unable to add practice details to the database.</p>"); 
	return true;
}

function EditPractice($inPracticeId=null, $inTeamId=null, $inDate=null, $inTime=null, $inVenue=null, $inPlayers=null, $inPositions=null, $inPoints=null)
{
		$query = mysql_query("UPDATE Practice SET TeamID=".$inTeamId.",Date='".$inDate."',Time='".$inTime."',Venue='".$inVenue."' WHERE PracticeID=".$inPracticeId.""); 
		for ($i = 0; $i <= count($inPlayers) - 1; $i++){
		    EditPracticePlayers($inPracticeId,$inTeamId,$inPlayers[$i],$inPositions[$i],$inPoints[$i]) or die ("<p class='error'>Sorry, we were unable to edit the practice schedule's players from the database.</p>");
		}
		echo 'You have successfully edited the practice schedule!<br />';
		return true;	
}
?>
