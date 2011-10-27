<?php
include_once 'squadMem.php';

	require("dbconnect.php");
	
	$conn = mysql_connect("localhost",MYSQL_USERNAME,MYSQL_PASSWORD)or 
  die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
  
	mysql_select_db(MYSQL_DATABASE, $conn) or 
  die ("<p class='error'>Sorry, we were unable to select the MYSQL_DATABASE database.</p>");

//returns all members of the given SquadKind 
//output format: MembershipID, SquadID, TeamID, SquadKind, Team, Name, Gender, Sport, Athlete Status

//support all or a certain SquadKind
function GetSquadMems($inSquadKind = null)
{
	if (!empty($inSquadKind))
	{
		$query = "SELECT * 
                          FROM SquadMemDetails s 
                          WHERE s.SquadID IN ( SELECT SquadID 
                                               FROM Squad 
                                               WHERE SquadKind = '" . $inSquadKind . "' ) 
                          ORDER BY MembershipID DESC"); 
	
		$query = "SELECT S.SquadKind as Squad, T.TeamName as Team, CONCAT(A.Surname,', ',A.Firstname) as'AthleteName'          FROM SquadMemDetails SMD
                       LEFT JOIN (AthleteStatus AS, Status St, Athlete A )  on (SMD.MembershipID = A.MembershipID AND AS.MembershipID = A.MembershipID AND St.StatusID = AS.StatusID) LEFT JOIN( Squad Sq ) on (SMD.SquadID = Sq.SquadID) LEFT JOIN (TeamMemDetails, Team T ) on (  T.TeamID = AND A.SquadID = S.SquadID)";

	$result = mysql_query($query);

	} 
        
        $squadMemArray = array();

	while ($row = mysql_fetch_assoc($result))
	{
		$mySquadMem = new SquadMem($row["MembershipID"], $row['SquadID']);
		array_push($squadMemArray, $mySquadMem);
	}
	return $squadMemArray;
}
//--	
function AddSquadMem($inmemID = null, $inSquadKind =null)
{
//check does not exist then insert
		$query = mysql_query("INSERT INTO squad(squad_kind) values ('". $inSquadKind ."')"); 
		mysql_query($query);
	}

function DeleteSquadMem($inSquadId=null)
{
		$query = mysql_query("DELETE from squad WHERE id=".$inSquadId.""); 
		mysql_query($query);
	}

function EditSquadMem($inSquadId=null, $inSquadKind=null)
{
		$query = mysql_query("UPDATE squad SET squad_kind='".$inSquadKind."' WHERE id=".$inSquadId); 
		mysql_query($query);
	}
?>
