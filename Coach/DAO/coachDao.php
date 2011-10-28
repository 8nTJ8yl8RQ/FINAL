<?php

include_once 'Model/coach.php';

// Change this info so that it works with your system.
$connection = mysql_connect('localhost', 'root', 'n4UVFpHeHr') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "bulilit";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetCoach($inId=null, $inName =null, $inUserType=null, $inTeamId=null)
{
	if (!empty($inId))
	{
		$query = mysql_query("SELECT * FROM Coach C, CoachContactDetails CD where C.CoachID=CD.CoachID and C.CoachID='" . $inId . "' ORDER BY C.CoachID DESC"); 
	} 
	else if (!empty($inName))
	{
		$query = mysql_query("SELECT * FROM Coach C, CoachContactDetails CD where C.CoachID=CD.CoachID where C.Name like '%" .$inName. "%' ORDER BY C.Name ASC"); 
	} 
	else if (!empty($inTeamId)){
		$query = mysql_query("SELECT * FROM Coach C left join CoachContactDetails CD ON C.CoachID=CD.CoachID  where C.CoachID in(SELECT T.CoachID FROM TeamCoach T WHERE T.TeamID=" .$inTeamId. ") ORDER BY C.Name ASC");
	}
	else {
		$query = mysql_query("SELECT * FROM Coach C, CoachContactDetails CD where C.CoachID=CD.CoachID ORDER BY C.Name ASC");
		}
	$coachArray = array();
	while ($row = mysql_fetch_assoc($query))
	{
		$myCoach = new Coach($row["CoachID"], $row['Name'], $row['SSSNo'], $row['Address'], $row['TelNo'], $row['MobileNo'], $row['Email']);
		array_push($coachArray, $myCoach);
		}
	return $coachArray;
	}

function AddCoachDetails($inCoachID, $inAddress, $inTelNo, $inMobileNo, $inEmail){
		$query = mysql_query("INSERT INTO CoachContactDetails(CoachID, Address,TelNo,MobileNo,Email) VALUES (". $inCoachID .", '". $inAddress ."','". $inTelNo ."','". $inMobileNo ."','". $inEmail ."')") or die ("<p class='error'>Sorry, we were unable to add the coach details to the database.</p>"); 
		echo 'You have successfully added <?php echo $_POST["teamName"]; ?>!<br />';
		echo 'You have set the team\'s grade as '.$_POST["teamGrade"].'.';
}

function AddCoach($inName =null, $inSSSNo=null)
{
		$query = mysql_query("INSERT INTO Coach(Name, SSSNo) VALUES('". $inName ."',". $inSSSNo .")") or die ("<p class='error'>Sorry, we were unable to add the coach to the database.</p>"); 
		echo 'You have successfully added '. $inName .'!<br />';
		return mysql_insert_id();
	}

function DeleteCoach($inCoachId=null)
{
		$query = mysql_query("DELETE FROM CoachContactDetails WHERE CoachID=".$inCoachId.""); 
		mysql_query($query);
		$query = mysql_query("DELETE FROM Coach WHERE CoachID=".$inCoachId."");
		mysql_query($query);
	}
	
function EditCoach($inCoachId=null, $inName =null, $inSSSNo=null, $inAddress, $inTelNo, $inMobileNo, $inEmail)
{
		$query = mysql_query("UPDATE Coach SET Name='". $inName ."', SSSNo=". $inSSSNo ." WHERE CoachID=". $inCoachId .""); 
		mysql_query($query);
		$query = mysql_query("UPDATE CoachContactDetails SET Address='". $inAddress ."', TelNo='". $inTelNo ."',MobileNo='". $inMobileNo ."',Email='". $inEmail ."' WHERE CoachID=". $inCoachId .""); 
		mysql_query($query);
		echo 'You have successfully edited '. $inName .'!<br />';
	}
?>
