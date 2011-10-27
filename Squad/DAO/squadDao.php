<?php

include_once "Model/squad.php";
include_once "Model/mysqlConfig.php";
include_once "Model/SquadMemView.php";
include_once "Model/TrainingSquadMemView.php";
include_once "Model/SquadMemDetails.php";

class SquadDao {

private $mysquad;
//private $db = null;
public $db = null;
public $data = array();


//private $result ;// resource handler for the last query

function __construct(
MySQL &$db
, Squad &$sqd = null
) {
    
    $this->db = $db;
	
    $this->mysquad = $sqd;
	
	$sql_stmt ="";
	//reflect content in database to class squad instance
	if($sqd !== null){
		if ($sqd->SquadID !== null) {
			$this->mysquad->SquadID = $sqd->SquadID;
			$sql_stmt  = "SELECT * FROM Squad WHERE SquadID='" . $sqd->SquadID . "'"; 
		} else if ($sqd->SquadKind !== null) {
			$this->mysquad->SquadKind = $sqd->SquadKind; 
			$sql_stmt = "SELECT * FROM Squad WHERE SquadKind = '" . $sqd->SquadID . "'"; 
		}
		
		if(!empty($sql_stmt)) {
			$this->db->query($sql_stmt);
			$this->data = $this->db->fetch();
	
			if ($this->db->countRows() === 1 ) {
				$this->mysquad->SquadID   = $this->data['SquadID'];
				$this->mysquad->SquadKind = $this->data['SquadKind'];
			} 
		}
	}
}
// this function must be called with atleast  one argument that is not null
function GetSquad($inId=null, $inSquadKind =null){
	if (empty($inId) && empty($inSquadKind)) { 
		throw new Exception( 'Error : GetSquad() all arguments were null.');
	}
	$squadArray = array();
	
	if (!empty($this->mysquad)) {
		if($inId === $this->mysquad->SquadID || $inSquadKind === $this->mysquad->SquadKind){
			return $this->data;
		}
	}
	$sql_stmt  ="";
	if (!empty($inId)) {	
		$sql_stmt  = "SELECT * FROM Squad WHERE SquadID ='" . $inId . "'"; 
	} else if (!empty($inSquadKind)) {
		$sql_stmt = "SELECT * FROM Squad WHERE SquadKind = '" .$inSquadKind. "'"; 
		
	} 
	
	//$result = mysql_query($sql_stmt);	
	$this->db->query($sql_stmt);
	
	while ($row = $this->db->fetch()) {
		$mySqd = new Squad($row['SquadID'], $row['SquadKind']);
		array_push($squadArray, $mySqd);
	}
	
	//mysql_free_result( $result );// not needed becuase result is few
	return $squadArray;
}

function GetAllSquad() {
	$sql_stmt = "SELECT * FROM Squad ORDER BY SquadID ASC";
	$result = mysql_query($sql_stmt);	
	$squadArray = array();
	
	while ($row = mysql_fetch_assoc($result)) {
		$mySqd = new Squad($row['SquadID'], $row['SquadKind']);
		array_push($squadArray, $mySqd);
	}
	
	mysql_free_result ( $result );// not needed becuase result is few
	return $squadArray;
	
}

function GetAllSquadMem($order) {
	
	$sql_stmt="SELECT DISTINCT * FROM Status NATURAL JOIN AthleteStatus NATURAL JOIN Athlete NATURAL JOIN SquadMemDetails NATURAL JOIN Squad ORDER BY $order";

	$result = mysql_query($sql_stmt);
	//$squadArray = null;	
	$squadArray = array();
	
	while ($row = mysql_fetch_assoc($result)) {
		$mySqd = new SquadMemView($row['MID'], $row['SquadID'], $row['Name'], $row['Status'], $row['Squad'], $row['Gender']);
		array_push($squadArray, $mySqd);
	}
	
	mysql_free_result ( $result );
	return $squadArray;
}

function getAllCandidateForPromotion(){

	$sql_stmt="SELECT s.Sport,trnSp.Grade, trnSp.MembershipID,trnSp.Name,trnSp.Status 
		   FROM Sport s 
		   JOIN (
			SELECT g.Grade,trnsqGr.MembershipID,trnsqGr.SportID,trnsqGr.Name,trnsqGr.Status 
			FROM Grade g 
			JOIN (
				SELECT ag.MembershipID, ag.GradeID, ag.SportID, trnsqSt.SquadID ,trnsqSt.Name ,trnsqSt.Status ,trnsqSt.Squad 
				FROM AthleteGrades ag 
				JOIN (
					SELECT sqms.MID, sq.SquadID, sqms.Name,sqms.Status, sq.SquadKind as Squad 
					FROM Squad sq 
					JOIN (
						SELECT AwSk.MID as MID, sm.SquadID as SquadID, AwSk.Name as Name, AwSk.StatusKind as Status 
						FROM SquadMemDetails sm 
						JOIN (
							SELECT Ast.MembershipID as MID,CONCAT(a.Surname,' ', a.FirstName,' ', a.MiddleInitial,'.') as Name, Ast.StatusKind 
							FROM Athlete a 
							JOIN ( 
								SELECT MembershipID, StatusKind FROM Status s 
								JOIN AthleteStatus 
								WHERE s.StatusID = AthleteStatus.StatusID) as Ast 
							WHERE Ast.MembershipID = a.MembershipID ) as AwSk 
						WHERE sm.MembershipID=AwSk.MID) as sqms 
					WHERE (sqms.SquadID=sq.SquadID AND sq.SquadKind='Training Squad') ) as trnsqSt 
				WHERE ag.MembershipID=trnsqSt.MID) as trnsqGr 
			WHERE trnsqGr.GradeID=g.GradeID) as trnSp 
		   WHERE trnSp.SportID=s.SportID";

	$result = mysql_query($sql_stmt);
	$squadArray = null;	
	$squadArray = array();
	
	while ($row = mysql_fetch_assoc($result)) {
		$mySqd = new TrainingSquadMemView($row['Sport'], $row['Grade'], $row['MembershipID'], $row['Name'], $row['Status']);
		array_push($squadArray, $mySqd);
	}
	
	mysql_free_result ( $result );
	return $squadArray;

}

//promote squad members
function promoteSquadMems(&$memIds,$position){
        //prepare string for the query by concatenating them
        // this step can be moved to another class which perform string operations
	$str_memIds ="";
	$count = count($memIds);
	$i     = 0             ;

	while($i < ($count-1)) {
		$str_memIds .= "$memIds[$i],";
		$i += 1;
	}
	$str_memIds .= "$memIds[$i]";

        //construct sql_query statement
	$sql_stmt="UPDATE SquadMemDetails sqmd 
		   SET SquadID=$position
                   WHERE sqmd.MembershipID in ($str_memIds)";
//	var_dump($sql_stmt);

	//update squad MemDetails
	$this->db->query($sql_stmt);

	//delete from AthleteGrades
	$sql_stmt="DELETE FROM AthleteGrades ag 
                   WHERE ag.MembershipID in ($str_memIds)";
	$this->db->query($sql_stmt);

	//delete From TeamMembershipDetails
	$sql_stmt="DELETE FROM TeamMemDetails tmd 
                   WHERE tmd.MembershipID in ($str_memIds)";
	$this->db->query($sql_stmt);
}

function AddSquad($inSquadKind = null) {
		$this->mysquad->SquadKind = $inSquadKind;
		$sql_stmt = "INSERT INTO Squad(SquadKind) VALUES ('". $inSquadKind ."')"; 
		$this->db->query($sql_stmt);
		$this->mysquad->SquadID = $this->db->getInsertID();
}

function DeleteSquad($inSquadId=null) {

		if ( $inSquadId === $this->mysquad->SquadID )  
			$this->mysquad = null;
		
		$sql_stmt = "DELETE FROM Squad WHERE SquadID='".$inSquadId."'";
		$this->db->query($sql_stmt);
}

function EditSquad($inSquadId=null, $inSquadKind=null){
		$query = "UPDATE squad SET squad_kind='".$inSquadKind."' WHERE id='".$inSquadId."'"; 
		mysql_query($query);
}

}

?>
