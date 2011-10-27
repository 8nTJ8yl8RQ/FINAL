<?php
include_once 'mysqlConfig.php';
include_once 'SquadMemDetails.php';

class SquadMemDetailsDao {

private $squadMem;
private $db = null;
private $data = array();

function __construct(
MySQL $db
, SquadMemDetails $inSqdMem = null
) {
	$this->db = $db;
	
	$sql_stmt ="";
	if($inSqdMem !== null){
		if ($inSqdMem->MembershipID !== null) {
			$this->squadMem->MembershipID = $inSqdMem->MembershipID;
			$sql_stmt  = "SELECT * FROM SquadMemDetails WHERE MembershipID='" . $inSqdMem->MembershipID . "'"; 
		} else if ($inSqdMem->SquadID !== null) {
			$this->squadMem->SquadID = $inSqdMem->SquadID; 
			$sql_stmt = "SELECT * FROM SquadMemDetails WHERE SquadID = '" . $inSqdMem->SquadID . "'"; 
		}
		
		if(!empty($sql_stmt)) {
			$this->db->query($sql_stmt);
			while($row = $this->db->fetch()) {
				$mem = new SquadMemDetails($row['MembershipID'], $row['SquadID']);
				array_push($this->data, $mem);
			}
		}
	
}

//add/insert
// this is for training squad members only
function addSquadMember($inMemID, $inSqdID){

// check if it exist before insert
	if(!empty($inMemID) and !empty($inSqdID)) {
		if( !in_array($inMemID, $this->data, TRUE) ) { 
			$sql_stmt = "INSERT INTO SquadMemDetails (MembershipID,SquadID) VALUES ('". $inMemID ."','".$inSqdID."')" ; 
			$this->db->query($sql_stmt);
			
			//update array
			$mem = new SquadMemDetails($inMemID, $inSqdID);
			array_push($this->data, $mem);
		}
		return TRUE;
	}  else {
		return FALSE;
	 //throw new Exception( 'Error : Empty argument not allowed in addSquadMember() function.' );
	}
}
	
}
//delete one member
function deleteSquadMember($inMemID){
	if (!empty($inMemID)) {
		$sql_stmt = "DELETE FROM SquadMemDetails WHERE MembershipID='".$inMemID."'";
		$this->db->query($sql_stmt);
		//remove data entry in this->data
		return TRUE;
	}
	return FALSE;
}

//update one member
function UpdateSquadMemberInfo($inMemID, $inSqdID ){
	if(!empty($inMemID) and !empty($inSqdID)) {
		$sql_stmt = "UPDATE SquadMemDetails SET SquadID='".$inSquadKind."' WHERE MembershipID='".$inMemID."'"; 
		$this->db->query($sql_stmt);
		return TRUE;
	}
}

//getSquadMembers for low level access

// by SquadID, by MembershipID, All

function getSquadMembers($inMemID=null, $inSqdID=null){
	
    //by membership id 
	if(!empty($inMemID) ) {
		$sql_stmt  = "SELECT * FROM SquadMemDetails WHERE MembershipID='" . $inMemID . "'";
	}
	//by Squad ID
	 else if(!empty($inSqdID) ) {
		$sql_stmt  = "SELECT * FROM SquadMemDetails WHERE SquadID='" . $inSqdID. "'";
	} else {	// get all if nothing is specified
		$sql_stmt  = "SELECT * FROM SquadMemDetails";
	}
	
	$this->db->query($sql_stmt); 
	
	$this->data = null;
		
	while($row = $this->db->fetch()) {
		$mem = new SquadMemDetails($row['MembershipID'], $row['SquadID']);
		array_push($this->data, $mem);
	}
	return $this->data;
}


//user views
//getSquadMembers display - Last name, first name, Squad, Team, Sport, Status

//get athlete grades candidate for squad promotion
//membership id, Last Name, First Name, Grade

//get teams by squad
//squad, team

//get members by team and squad
//membership, squad, team

//promote individually

//

}

?>
